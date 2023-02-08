<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/login',function(){
    return view('auth.login');
})->name('login');

Route::get('/register',function(){
    return view('auth.register');
})->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login.action');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/', function(){
    return view('layouts.landing_pages.home');
})->name('welcome');
Route::get('/product', function(){
    return view('layouts.landing_pages.product');
})->name('product');
Route::get('/product/{id}', function(){
    return view('layouts.landing_pages.product_detail');
})->name('product.show');
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');


// cart
Route::group(['prefix'=>'cart'],function(){
    Route::get('/add/{id}',[CartController::class,'add'])->name('cart.create');
});

Route::group(['prefix' => 'master','middleware'=>'auth'], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user',UserController::class);
    Route::resource('member', MemberController::class);
});


