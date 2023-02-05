<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $check = User::where('email',$request->email)->first();

        if(!$check){
            return redirect()->back()->withInput()->withErrors(['email'=>'These credentials do not match our records.']);
        }


        if(!Hash::check($request->password,$check->password)){
            return redirect()->back()->withInput()->withErrors(['email'=>'These credentials do not match our records.']);
        }


        if($check->role == 'admin'){
            auth()->login($check);
            return redirect()->route('home');
        }

        auth()->login($check);
        return redirect()->route('welcome');

    }


    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
