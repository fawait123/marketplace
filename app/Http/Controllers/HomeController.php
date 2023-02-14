<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Transaction;
use App\Helpers\Utils;
use App\Models\Booking;

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

    public function booking()
    {
        return view('layouts.landing_pages.booking');
    }

    public function bookingStore(Request $request)
    {
        $check = Booking::where('user_id',$request->user_id)->where('date',$request->date)->first();
        if($check){
            return 'warning';
        }

        $check2 = Booking::where('date',$request->date)->count();

        if($check2 > 5){
            return 'warning';
        }

        Booking::create([
            'title'=>$request->description,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'status'=>'created',
        ]);

        return 'success';
    }

    public function bookingGet()
    {
        $get =  Booking::all();
        $data = collect([]);

        $no = 1;
        foreach ($get as $item) {
            $data->push([
                'id'=>$no++,
                'title'=>$item->title,
                'start'=>$item->date
            ]);
        }

        return $data;

    }
}
