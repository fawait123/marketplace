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
use App\Http\Controllers\MontirController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Montir;
use App\Models\Order;
use Illuminate\Http\Request;


Route::get('/login',function(){
    return view('auth.login');
})->name('login');

Route::get('/register',function(){
    return view('auth.register');
})->name('register');

Route::get('/', function(){
    $categories = Category::all();
    return view('layouts.landing_pages.home',compact('categories'));
})->name('welcome');


Route::get('/product', function(){
    return view('layouts.landing_pages.product');
})->name('product');


Route::get('/order-mechanic', function(){
    $mechanic = Montir::latest()->get();
    $order = Order::where('date',date('Y-m-d'))->where('status','!=','completed')->first();
    return view('layouts.landing_pages.order_mechanic',compact('mechanic','order'));
})->name('order.mechanic');

Route::get('/product/{id}', function(Request $request,$id){
    $product = Product::find($id);
    if($product){
        return view('layouts.landing_pages.product_detail',compact('product'));
    }
    return abort(404);
})->name('product.detail');

Route::get('/contact',function(){
    return view('layouts.landing_pages.contact');
})->name('contact');

Route::get('/account',function(){
    return view('layouts.landing_pages.account');
})->name('account')->middleware('auth');


Route::post('/login',[AuthController::class,'login'])->name('login.action');
Route::post('/register',[AuthController::class,'register'])->name('register.action');
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
Route::post('/changePassword',[AuthController::class,'changePassword'])->name('changePassword')->middleware('auth');
Route::post('/register/member',[AuthController::class,'registerMember'])->name('registerMember')->middleware('auth');


// transaction
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/order',[CheckoutController::class,'order'])->name('checkout.order');




Route::get('/cart', [HomeController::class,'cart'])->name('cart')->middleware('auth');
Route::get('/booking',[HomeController::class,'booking'])->name('booking')->middleware('auth');
Route::get('/booking/store',[HomeController::class,'bookingStore'])->name('booking.store.fe')->middleware('auth');
Route::get('/booking/index',[HomeController::class,'bookingGet'])->name('booking.get')->middleware('auth');
Route::get('/cart/updatetotal',[HomeController::class,'updateTotal'])->name('cart.updateTotal')->middleware('auth');
Route::get('/booking/check',[HomeController::class,'check'])->name('booking.check')->middleware('auth');
// route order
Route::post('/order/store',[OrderController::class,'storeFe'])->name('order.storeFe')->middleware('auth');


// cart
Route::group(['prefix'=>'cart','middleware'=>'auth'],function(){
    Route::get('/add/{id}',[CartController::class,'add'])->name('cart.create');
    Route::get('/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
});


// ================================================== ADMIN =================================================================
Route::get('/home', [HomeController::class,'index'])->name('home')->middleware('auth')->middleware('role:admin');
Route::group(['prefix' => 'master','middleware'=>['auth','role:admin']], function () {
    Route::get('/product/ubah/{id}',[ProductController::class,'update'])->name('product.ubah');
    Route::get('/member/status',[MemberController::class,'status'])->name('member.status');
    Route::get('/product/json',[ProductController::class,'json'])->name('product.json');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user',UserController::class);
    Route::resource('member', MemberController::class);
    Route::resource('montir', MontirController::class);
});


Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
    Route::get('transaction',[TransactionController::class,'index'])->name('transaction.index');
    Route::get('transaction/changeStatus',[TransactionController::class,'changeStatus'])->name('transaction.change.status');
    Route::get('transaction/create',[TransactionController::class,'index'])->name('transaction.create');
    Route::get('/transaction/{id}/show',[TransactionController::class,'show'])->name('transaction.show');
    // booking
    Route::get('booking',[BookingController::class,'index'])->name('booking.index');
    Route::get('booking/create',[BookingController::class,'create'])->name('booking.create');
    Route::post('booking/store',[BookingController::class,'store'])->name('booking.store');
    Route::get('booking/search',[BookingController::class,'search'])->name('booking.search');
    Route::get('booking/edit/{id}',[BookingController::class,'edit'])->name('booking.edit');
    Route::get('booking/destroy/{id}',[BookingController::class,'destroy'])->name('booking.destroy');
    Route::get('booking/status',[BookingController::class,'status'])->name('booking.status');
    Route::put('booking/update/{id}',[BookingController::class,'update'])->name('booking.update');
    Route::post('booking/setting',[BookingController::class,'setting'])->name('booking.setting');

    // order mechanic

    Route::get('order',[OrderController::class,'index'])->name('order.index');
    Route::get('order/changeStatus',[OrderController::class,'changeStatus'])->name('order.change.status');
    Route::get('order/create',[OrderController::class,'index'])->name('order.create');
    Route::get('order/{id}/show',[OrderController::class,'show'])->name('order.show');
    Route::get('share/{id}',[OrderController::class,'share'])->name('order.share');
    Route::get('complete/{id}',[OrderController::class,'complete'])->name('order.complete');
});


