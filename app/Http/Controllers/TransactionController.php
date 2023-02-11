<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.index');
    }

    public function changeStatus(Request $request)
    {
        Transaction::where('id',$request->id)->update([
            'status'=>$request->status
        ]);


        return 'success';
    }


    public function show($id)
    {
        $transaction = Transaction::with('detail.product')->find($id);
        if($transaction)
        {
            return view('pages.transaction.show',compact('transaction'));
        }

        return abort(404);
    }

}
