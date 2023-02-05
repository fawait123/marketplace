<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.form');
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
                "name"      => "required",
                "email"     => "required|email:dns|unique:users,email",
                "password"     => "required",
                "foto"           =>['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
                "role" => "required",
                "password_confirmation" => "same:password"
            ],
        );
        $foto = $request->file('foto');
        $filename = $foto->hashName();
        $validatedData['foto'] = $filename;
        $validatedData['password'] = bcrypt($request->password);

        $foto->storeAs('public/foto', $foto->hashName());
        $storeUser = User::create($validatedData);
        return redirect()->route('user.index')->with(['message' => 'User has been created']);

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
    public function edit(User $user)
    {
        $id = $user->id;
        return view('pages.user.form', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate(
            [
                "name"      => "required",
                "email"     => "required|email:dns|unique:users,email,".$user->id,
                "foto"           =>['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
                "role" => "required",
                "password_confirmation" => "same:password"
            ],
        );
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = $foto->hashName();
            $foto->storeAs('public/foto', $filename);
            $request['images'] = $filename;
        }else{
            $request['images'] = $user->foto;
        }
        if ($request->get('password') == '') {
            $user->update(array_merge($request->except('password','images'),['foto'=>$request->images]));
        } else {
            $user->update(array_merge($request->except('images'),['foto'=>$request->images]));
        }
        return redirect()->route('user.index')->with(['message' => 'User has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'User has been deleted']);
    }
}
