<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


Route::get('/login',function(){
    return view('auth.login');
})->name('login');

Route::get('/register',function(){
    return view('auth.register');
})->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login.action');
Route::post('/register',[AuthController::class,'register'])->name('register.action');
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::post('/changePassword',[AuthController::class,'changePassword'])->name('changePassword')->middleware('auth');
Route::post('/register/member',[AuthController::class,'registerMember'])->name('registerMember')->middleware('auth');


// transaction
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/order',[CheckoutController::class,'order'])->name('checkout.order');


Route::get('/', function(){
    $categories = Category::all();
    return view('layouts.landing_pages.home',compact('categories'));
})->name('welcome');
Route::get('/product', function(){
    return view('layouts.landing_pages.product');
})->name('product');
Route::get('/product/{id}', function(Request $request,$id){
    $product = Product::find($id);
    if($product){
        return view('layouts.landing_pages.product_detail',compact('product'));
    }
    return abort(404);
})->name('product.detail');
Route::get('/home', [HomeController::class,'index'])->name('home')->middleware('auth');
Route::get('/cart', [HomeController::class,'cart'])->name('cart')->middleware('auth');
Route::get('/booking',[HomeController::class,'booking'])->name('booking')->middleware('auth');
Route::get('/booking/store',[HomeController::class,'bookingStore'])->name('booking.store')->middleware('auth');
Route::get('/booking/index',[HomeController::class,'bookingGet'])->name('booking.get')->middleware('auth');

Route::get('/contact',function(){
    return view('layouts.landing_pages.contact');
})->name('contact');

Route::get('/account',function(){
    return view('layouts.landing_pages.account');
})->name('account')->middleware('auth');


// cart
Route::group(['prefix'=>'cart','middleware'=>'auth'],function(){
    Route::get('/add/{id}',[CartController::class,'add'])->name('cart.create');
    Route::get('/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
});

Route::group(['prefix' => 'master','middleware'=>'auth'], function () {
    Route::get('/product/ubah/{id}',[ProductController::class,'update'])->name('product.ubah');
    Route::get('/member/status',[MemberController::class,'status'])->name('member.status');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user',UserController::class);
    Route::resource('member', MemberController::class);
});


Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('transaction',[TransactionController::class,'index'])->name('transaction.index');
    Route::get('transaction/changeStatus',[TransactionController::class,'changeStatus'])->name('transaction.change.status');
    Route::get('transaction/create',[TransactionController::class,'index'])->name('transaction.create');
    Route::get('/transaction/{id}/show',[TransactionController::class,'show'])->name('transaction.show');
    // booking
    Route::get('booking',[BookingController::class,'index'])->name('booking.index');
    Route::get('booking/create',[BookingController::class,'create'])->name('booking.create');
    Route::post('booking/store',[BookingController::class,'store'])->name('booking.store');
});


