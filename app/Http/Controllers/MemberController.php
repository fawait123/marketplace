<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pages.member.form',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'user_id'=>'required|unique:members,user_id',
                'nik'=>'required',
                "name"      => "required",
                "telp"     => "required",
                "address"     => "required",
                "gender"     => "required",
                "email"     => "required|email:dns|unique:members,email",
                "foto"      => ['required','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
            ],
        );
        $foto = $request->file('foto');
        $filename = $foto->hashName();
        $request['images'] = $filename;

        $foto->storeAs('public/foto', $foto->hashName());
        $storeUser = Member::create(array_merge($request->except('foto'),['foto'=>$request->images]));
        return redirect()->route('member.index')->with(['message' => 'Member has been created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $id = $member->id;
        $users = User::all();
        return view('pages.member.form', compact('member', 'id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate(
            [
                'user_id'=>'required|unique:members,user_id,'.$member->id,
                'nik'=>'required',
                "name"      => "required",
                "telp"     => "required",
                "address"     => "required",
                "gender"     => "required",
                "email"     => "required|email:dns|unique:members,email,".$member->id,
                "foto"      => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
            ],
        );

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = $foto->hashName();
            $request['images'] = $filename;
            $foto->storeAs('public/foto', $foto->hashName());
        }else{
            $request['images'] = $member->foto;
        }
        $member->update(array_merge($request->except('foto'),['foto'=>$request->images]));
        return redirect()->route('member.index')->with(['message' => 'Member has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with(['message' => 'Member has been deleted']);
    }
}
