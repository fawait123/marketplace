<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Transaction;
use App\Helpers\Utils;

class HomeController extends Controller
{
    use Transaction;
    public function index()
    {
        $now = Utils::transactionCart(0);
        $tomorrow = Utils::transactionCart(1);
        $week = Utils::transactionCart(7);
        $month = Utils::transactionCart(30);
        $data = collect([
            'now' => $now,
            'tomorrow' => $tomorrow,
            'week' => $week,
            'month' => $month,
        ]);
        // dd($data);
        return view('home',compact('data'));
    }

    public function cart(Request $request)
    {
        return Utils::cart($request->from,$request->to);
    }
}
