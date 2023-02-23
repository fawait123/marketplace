<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use Illuminate\Http\Request;

class MontirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.montir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.montir.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'focus' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        Montir::create($request->all());
        return redirect()->route('montir.index')->with(['message' => 'Montir has been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function show(Montir $Montir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function edit(Montir $montir)
    {
        $id = $montir->id;
        return view('pages.Montir.form', compact('montir', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Montir $Montir)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'focus' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $Montir->update($request->all());
        return redirect()->route('montir.index')->with(['message' => 'Montir has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Montir $Montir)
    {
        $Montir->delete();
        return redirect()->route('montir.index')->with(['message' => 'Montir has been deleted']);
    }
}
