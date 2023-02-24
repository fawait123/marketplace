<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Helpers\AutoGenerate;
use App\Mail\OrderMail;
use App\Mail\LocationMail;
use App\Mail\ReplyMail;
use Illuminate\Support\Facades\Mail;
use App\Events\RealtimeNotification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function storeFe(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'montir_id'=>'required',
            'latitude'=>"required",
            'longitude'=>"required",
        ]);

        $order = Order::create(array_merge($request->except('_token'),['order_id'=>AutoGenerate::code('ORD'),'status'=>'created','user_id'=>auth()->user()->id,'date'=>date('Y-m-d')]));
        $findOrder = Order::with('montir')->find($order->id);
        event(new RealtimeNotification($request->name.' melakukan order mechanic'));
        Mail::to($request->email)->send(new OrderMail($findOrder));
        return redirect()->route('welcome')->with(['message'=>'Order created']);
    }


    public function share(Request $request, $id)
    {
        $order = Order::with('montir')->find($id);
        $order->update([
            'status'=>'process'
        ]);
        Mail::to($order->email)->send(new ReplyMail($order));
        Mail::to($order->montir->email)->send(new LocationMail($order));
        return redirect()->route('order.index')->with(['message'=>'Location shared']);
    }

    public function complete(Request $request,$id)
    {
        $order = Order::with('montir')->find($id);
        $order->update([
            'status'=>'complete'
        ]);
        return redirect()->route('order.index')->with(['message'=>'Transaction completed successfully']);
    }
}
