<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Helpers\AutoGenerate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Helpers\Utils;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('pages.product.form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'           => 'required',
            'foto'           => 'required|file|mimes:jpeg,jpg,png,gif',
            'deskripsi'      => 'required',
            'harga'          => 'required',
            'harga'          => 'required|integer',
            'harga_promo'    => 'integer',
            'category_id'    => 'required',
            'stok'          =>'required|integer',
            'additionalImageFile.*'=>'image|mimes:jpg,jpeg,png,jfif,svg',
        ],
        [
            'name.required'        => 'Name required',
            'foto.required'        => 'Image required',
            'foto.image'        => 'Files in the form of images',
            'foto.mimes'        => 'Image extensions in jpeg jpg png svg',
            'deskripsi.required'   => 'Description required',
            'harga.required'       => 'Price required',
            'harga.integer'       => 'Price is number',
            'harga_promo.integer'       => 'Promo price is number',
            'category_id.required'     => 'Category required',
            'stok.required'=>'Stok required',
            'stok.integer'=>'Stok is number'
        ]
    );

        try {
            $file = $request->file('foto');
            $foto = Utils::upload($file);
            $product = Product::create(array_merge($request->except('image'),['foto'=>$foto,'qrcode'=>AutoGenerate::code('PRD')]));
            if($request->hasFile('additionalImageFile')){
                $additionalImage = $request->file('additionalImageFile');
                for ($i=0; $i < count($additionalImage); $i++) {
                    $additionalFoto = Utils::upload($additionalImage[$i]);
                    ProductDetail::create([
                        'product_id' => $product->id,
                        'image'=>$additionalFoto
                    ]);
                }
            }
            return redirect()->route('product.index')->with(['message' => 'Produk has been created']);
        } catch (\Throwable $th) {
            return back()->with(['message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */


     public function ubah(Request $request)
     {
        if($request->filled('id')){
            return view('pages.product.edit');
        }

        return abort(404);
     }
    public function edit(Product $product)
    {
        if($product){
            return view('pages.product.edit');
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name'           => 'required',
            'foto'           => 'image|mimes:jpeg,jpg,png,gif',
            'deskripsi'      => 'required',
            'harga'          => 'required|integer',
            'harga_promo'    => 'integer',
            'stok'          =>'required|integer',
            'category_id'    => 'required',
            'additionalImageFile.*'=>'image|mimes:jpg,jpeg,png,jfif,svg',
        ],
        [
            'name.required'        => 'Name required',
            'foto.required'        => 'Image required',
            'foto.image'        => 'Files in the form of images',
            'foto.mimes'        => 'Image extensions in jpeg jpg png svg',
            'deskripsi.required'   => 'Description required',
            'harga.required'       => 'Price required',
            'harga.integer'       => 'Price is number',
            'harga_promo.integer'       => 'Promo price is number',
            'category_id.required'     => 'Category required',
            'stok.required'=>'Stok required',
            'stok.integer'=>'Stok is number'
        ]
    );
        try {
            $fileName = $product->foto;
            if($request->hasFile('foto')){
                $file = $request->file('foto');
                $fileName = Utils::upload($file);
            }


            $product->update(array_merge($request->all(),['foto'=>$fileName]));
            if($request->hasFile('additionalImageFile')){
                $additionalImage = $request->file('additionalImageFile');
                for ($i=0; $i < count($additionalImage); $i++) {
                    $additionalFoto = Utils::upload($additionalImage[$i]);
                    ProductDetail::where('id',$request->id[$i])->update([
                        'image'=>$additionalFoto
                    ]);
                }
            }
            return redirect()->route('product.index')->with(['message' => 'product has ben updated']);
        } catch (\Throwable $th) {
            return back()->with(['message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with(['message' => 'Product has been deleted']);
    }

    public function json(Request $request)
    {
        $columns = array(
            0 =>'name',
            1 =>'foto',
            2=> 'qrcode',
            3=> 'deskripsi',
            5=> 'harga',
            6=> 'harga_promo',
            7=> 'kategori',
        );

        $totalFiltered = Product::query();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $products = Product::query();
        $products = $products->with('category');
        if(!empty($request->input('search.value'))){
            $search = $request->input('search.value');
            $products = $products->where('name', 'like','%'.$search.'%');
            $totalFiltered = $totalFiltered->where('name', 'like','%'.$search.'%');

        }

        $products = $products->offset($start)->limit($limit)->orderBy($order,$dir)->latest()->get();

        $data = array();
        if(!empty($products)){
            foreach ($products as $key=>$product){
            $edit =  route('product.ubah').'?id='.$product->id;
            $destroy =  route('product.destroy',$product->id);
            $src = Utils::url($product->foto);

            $nestedData['no'] = (str_split($start)[0]) * $limit + $key + 1;
            $nestedData['name'] = $product->name;
            $nestedData['foto'] = "<img style='width: 200px' src='{$src}'
            class='img-thumbnail' alt='No Image'>";
            $nestedData['deskripsi'] = substr(strip_tags($product->deskripsi),0,50)."...";
            $nestedData['harga'] = number_format($product->harga,2,',','.');
            $nestedData['harga_promo'] = number_format($product->harga_promo,2,',','.');
            $nestedData['ketegori'] = $product->category->name ?? '';
            $nestedData['stok'] = $product->stok == null ? 0 : $product->stok;
            $nestedData['options'] = "&emsp;<a href='{$edit}'
            class='text-primary'><i class='mdi mdi-lead-pencil'></i></a>
                                    &emsp;<a href='#' data-toggle='modal'
                                    data-target='#exampleModal' data-url='{$destroy}'
                                    class='text-danger'><i class='mdi mdi-trash-can-outline'></i></a>";
            $data[] = $nestedData;

            }
        }


        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval(Product::count()),
            "recordsFiltered" => intval($totalFiltered->count()),
            "data"            => $data
        );

        return json_encode($json_data);
    }
}
