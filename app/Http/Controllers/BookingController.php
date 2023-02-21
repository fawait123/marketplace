<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Member;
use App\Models\SettingBooking;

class BookingController extends Controller
{
    public function index()
    {
        $setting = SettingBooking::latest()->first();
        return view('pages.booking.index',compact('setting'));
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
        $setting = SettingBooking::latest()->first();

        if($check >= $setting->mount){
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


    public function search(Request $request)
    {
        return Booking::where('date',$request->date)->get();
    }

    public function status(Request $request)
    {
        Booking::where('id',$request->id)->update([
            'status'=>$request->status
        ]);

        return 'success';
    }

    public function edit(Request $request,$id)
    {
        $booking = Booking::find($id);
        if($booking){
            $member = Member::all();
            return view('pages.booking.create',compact('member','booking','id'));
        }

        return abort(404);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'date'=>'required',
            'description'=>'required',
        ]);

        Booking::where('id',$id)->update([
            'title'=>$request->description,
            'date'=>$request->date,
            'description'=>$request->description,
        ]);
        return redirect()->route('booking.index')->with(['message' => 'Booking updated successfully']);

    }


    public function destroy($id)
    {
        $find = Booking::find($id);
        if($find){
            $find->delete();
            return redirect()->route('booking.index')->with(['message' => 'Booking deleted successfully']);
        }

        return abort(404);
    }

    public function setting(Request $request)
    {
        $request->validate([
            'setting'=>'required|integer'
        ]);

        SettingBooking::where('id',1)->update([
            'mount'=>$request->setting
        ]);

        return redirect()->route('booking.index')->with(['message' => 'Setting update successfully']);
    }
}
