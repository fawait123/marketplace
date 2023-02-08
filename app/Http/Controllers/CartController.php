<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request,$id)
    {
        $check = Cart::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
        if($check){
            Cart::where('user_id',auth()->user()->id)->where('product_id',$id)->update([
                'total'=>$check->total + 1
            ]);

            return redirect()->route('welcome')->with(['message'=>'Cart updated successfully']);
        }

        Cart::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$id,
            'total'=>1
        ]);

        return redirect()->route('welcome')->with(['message'=>'Cart added successfully']);
    }

    public function remove(Request $request,$id)
    {
        $check = Cart::find($id);

        if($check)
        {
            $check->delete();
            return redirect()->route('welcome')->with(['message'=>'Cart delete successfully']);
        }

        return abort(404);
    }
}
