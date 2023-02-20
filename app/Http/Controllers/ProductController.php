<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Helpers\AutoGenerate;

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
        // return $request->all();
        $validate = $request->validate([
            'name'           => 'required',
            'foto'           => 'required|file|mimes:jpeg,jpg,png,gif',
            'deskripsi'      => 'required',
            'harga'          => 'required',
            // 'harga_promo'    => 'required',
            'category_id'    => 'required',
            'additionalImageFile.*'=>'image|mimes:jpg,jpeg,png,jfif,svg',
            // 'image'=>'required',
        ],
        [
            'name.required'        => 'Name required',
            'foto.required'        => 'Image required',
            'foto.image'        => 'Files in the form of images',
            'foto.mimes'        => 'Image extensions in jpeg jpg png svg',
            'deskripsi.required'   => 'Description required',
            'harga.required'       => 'Price required',
            // 'harga_promo.required'     => 'Promo Price required',
            'category_id.required'     => 'Category required',
            // 'image.required' => 'Image required',
        ]
    );
    // return $request->all();

        $product = Product::create(array_merge($request->except('image'),['foto'=>$request->image,'qrcode'=>AutoGenerate::code('PRD')]));
        if($request->filled('additionalImage')){
            $additionalImage = $request->additionalImage;
            $additionalImage = array_filter($additionalImage, fn($value) => !is_null($value) && $value !== '');
            for ($i=0; $i < count($additionalImage); $i++) {
                ProductDetail::create([
                    'product_id' => $product->id,
                    'image'=>$additionalImage[$i]
                ]);
            }
        }
        return redirect()->route('product.index')->with(['message' => 'Produk has been created']);
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
    public function edit(Product $product)
    {
        if($product && request('id')){
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
            'harga'          => 'required',
            // 'harga_promo'    => 'required',
            'category_id'    => 'required',
            'additionalImageFile.*'=>'image|mimes:jpg,jpeg,png,jfif,svg',
            'image'=>'required',
        ],
        [
            'name.required'        => 'Name required',
            'foto.required'        => 'Image required',
            'foto.image'        => 'Files in the form of images',
            'foto.mimes'        => 'Image extensions in jpeg jpg png svg',
            'deskripsi.required'   => 'Description required',
            'harga.required'       => 'Price required',
            // 'harga_promo.required'     => 'Promo Price required',
            'category_id.required'     => 'Category required',
            'image.required'        => 'Image required',
        ]
    );
    // dd($request->all());
        $product->update(array_merge($request->all(),['foto'=>$request->image]));
        if($request->filled('additionalImage')){
            $additionalImage = array_filter($request->additionalImage, fn($value) => !is_null($value) && $value !== '');
            ProductDetail::where('product_id', $product->id)->delete();
            for ($i=0; $i < count($additionalImage); $i++) {
                ProductDetail::create([
                    'product_id' => $product->id,
                    'image'=>$additionalImage[$i]
                ]);
            }
        }
        // $product->update($request->all());
        return redirect()->route('product.index')->with(['message' => 'product has ben created']);
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
}
