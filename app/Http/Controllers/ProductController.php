<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
            'foto'           => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'qrcode'         => 'required',
            'deskripsi'      => 'required',
            'harga'          => 'required',
            'harga_promo'    => 'required',
            'category_id'    => 'required',
            'stok'           => 'required',

        ],
        [
            'name.required'        => 'Nama Harus Terisi',
            'foto.required'        => 'Silahkan Masukkan Foto',
            'qrcode.required'      => 'QR Code Harus Terisi',
            'deskripsi.required'   => 'Deskripsi Harus Terisi',
            'harga.required'       => 'Harga Harus Terisi',
            'harga_promo.required'     => 'Harga Promo Harus Terisi',
            'category_id.required'     => 'Kategori Harus Terisi',
            'stok.required'            => 'Stok Harus Terisi dengan angka',

        ]);
        $foto = $request->file('foto');
        $filename = $foto->hashName();
        $validate['foto'] = $filename;
        $foto->storeAs('public/foto', $foto->hashName());


        product::create($validate);
        return redirect()->route('product.index')->with(['message' => 'Produk has been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {

        $category = Category::get();
        $id = $product->id;
        return view('pages.product.form', compact('product', 'id', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index')->with(['message' => 'product has ben created']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with(['message' => 'Product has been deleted']);
    }
}
