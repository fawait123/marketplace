<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Cart;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CartResource;
use App\Traits\Checkout;
use App\Helpers\Utils;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product')->where('user_id',auth()->user()->id)->get();
        return view('layouts.landing_pages.checkout',compact('cart'));
    }


    public function order(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'payment_method'=>'required',
        ]);


        $transaction = Transaction::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'payment_method'=>$request->payment_method,
            'user_id'=>auth()->user()->id,
            'note'=>$request->note,
            'total'=>$request->total,
            'status'=>'created',
            'additional'=>json_encode([
                'payment_method'=>$request->payment_method,
                'price'=>$request->payment_method == 'take_away' ? 0 : 10000,
            ])
        ]);


        $carts = Cart::with('product')->where('user_id',auth()->user()->id)->get();
        foreach ($carts as $cart){
            TransactionDetail::create([
                'transaction_id'=>$transaction->id,
                'product_id'=>$cart->product_id,
                'product_id'=>$cart->product_id,
                'amount'=>$cart->total,
                'price'=>Utils::price($cart->product->harga, $cart->product->harga_promo),
                'sub_total'=>Utils::price($cart->product->harga, $cart->product->harga_promo) * $cart->total
            ]);
        }
        Cart::where('user_id',auth()->user()->id)->delete();

        // dd($request->all());
        return redirect()->route('welcome')->with(['message'=>'Transaction created successfully']);
    }
}
