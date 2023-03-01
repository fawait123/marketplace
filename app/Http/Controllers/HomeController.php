<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Transaction;
use App\Helpers\Utils;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\SettingBooking;

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
        $setting = SettingBooking::latest()->first();
        $check = Booking::where('user_id',$request->user_id)->where('date',$request->date)->first();
        if($check){
            return 'warning';
        }

        $check2 = Booking::where('date',$request->date)->count();

        if($check2 >= $setting->mount){
            return 'full';
        }

        Booking::create([
            'title'=>$request->description,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
            'date'=>$request->date,
            'status'=>'created',
            'merk'=>$request->merk
        ]);

        return 'success';
    }

    public function bookingGet()
    {
        $get =  Booking::with('user')->get();
        $data = collect([]);

        $no = 1;
        foreach ($get as $item) {
            $data->push([
                'id'=>$no++,
                'title'=>$item->title. ', '.$item->user->name,
                'start'=>$item->date
            ]);
        }

        return $data;

    }

    public function updateTotal(Request $request)
    {
        Cart::where('id',$request->id)->update([
            'total'=>$request->value
        ]);

        return 'success';
    }

    public function check(Request $request)
    {
        $check = Booking::with('user')->where('date',date('Y-m-d',strtotime($request->date)))->where('user_id',auth()->user()->id)->first();
        $check2;
        if($check){
           $check2 =  Booking::with('user')->whereNotIn('user_id',[$check->user_id])->where('date',date('Y-m-d',strtotime($request->date)))->get();
        }else{
            $check2 = Booking::with('user')->where('date',date('Y-m-d',strtotime($request->date)))->get();
        }
        return [
            'data1'=>$check,
            'data2'=>$check2,
        ];
    }
}
