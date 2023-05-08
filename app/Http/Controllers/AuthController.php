<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Utils;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $check = User::with('member')->where('email',$request->email)->first();

        if(!$check){
            return redirect()->back()->withInput()->withErrors(['email'=>'These credentials do not match our records.']);
        }


        if(!Hash::check($request->password,$check->password)){
            return redirect()->back()->withInput()->withErrors(['email'=>'These credentials do not match our records.']);
        }


        if($check->role == 'admin'){
            auth()->login($check,true);
            return redirect()->route('home');
        }

        auth()->login($check,true);
        return redirect()->route('product');

    }


    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|email:dns|unique:users,email',
            'password'=>'required|min:8|same:password_confirmation',
        ]);

        $foto = $request->file('foto');
        $filename = $foto->hashName();
        $validatedData['foto'] = $filename;
        $validatedData['password'] = bcrypt($request->password);
        $validatedData['role'] = 'user';

        $foto->storeAs('public/foto', $foto->hashName());
        $storeUser = User::create($validatedData);

        return redirect()->route('login')->with(['message' => 'User has been created']);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' =>'required|min:8|same:password_confirmation',
            'current_password'=>'required'
        ]);
        $check = User::where('id',auth()->user()->id)->first();
        if(!Hash::check($request->current_password,$check->password)){
            return redirect()->back()->withInput()->withErrors(['current_password'=>'The current password is incorrect']);
        }

        User::where('id',auth()->user()->id)->update([
            'password' => bcrypt($request->password)
        ]);
        auth()->logout();
        return redirect()->route('login')->with(['message' => 'Password has been changed']);
    }


    public function registerMember(Request $request)
    {
        $image = $request->file('image');
        $fileName = Utils::upload($image);
        Member::create(array_merge($request->except('image'),['user_id'=>auth()->user()->id,'is_active'=>0,'foto'=>$fileName]));
        return redirect()->route('welcome')->with(['message' => 'Password has been changed']);
    }

}
