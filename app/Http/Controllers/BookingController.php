<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Member;

class BookingController extends Controller
{
    public function index()
    {
        return view('pages.booking.index');
    }

    public function create()
    {
        $member = Member::all();
        return view('pages.booking.create',compact('member'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'description'=>'required',
        ]);

        $check = Booking::where('date',date('Y-m-d'))->count();

        if($check > 5){
            return redirect()->route('booking.index')->with(['message' => 'Booking full']);
        }

        Booking::create([
            'user_id'=>$request->user_id,
            'title'=>$request->description,
            'date'=>$request->date,
            'description'=>$request->description,
            'status'=>'created',
        ]);

        return redirect()->route('booking.index')->with(['message' => 'Booking created successfully']);
    }
}
