<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/cart', [CartController::class,'fromCart'])->name('cart');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']],function () {
    Route::get('dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('dashboard/participants', [AdminController::class,'participants'])->name('admin.participants');
    Route::get('dashboard/customers', [AdminController::class,'customers'])->name('admin.customers');
    Route::get('dashboard/products', [AdminController::class,'products'])->name('admin.products');
    Route::get('dashboard/sales', [AdminController::class,'sales'])->name('admin.sales');
});
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']],function () {
    Route::get('dashboard', [UserController::class,'index'])->name('user.dashboard');
    Route::get('dashboard/toAdmin/{id}', [UserController::class,'admin'])->name('user.toAdmin');
    Route::get('dashboard/product/{id}', [UserController::class,'show'])->name('product.show');
    Route::get('dashboard/product/user/{id}', [UserController::class,'participant'])->name('product.participant');

    Route::get('dashboard/cart', [UserController::class,'fromCart'])->name('user.cart');
    Route::get('dashboard/product/{id}', [UserController::class,'show'])->name('product.show');

    Route::post('dashboard/store-cart', [UserController::class, 'addToCart'])->name('store-cart');
    Route::post('dashboard/add-quant', [UserController::class, 'addToQuant'])->name('add-quant');
    Route::post('dashboard/add-checkout', [UserController::class, 'checkOut'])->name('add-checkout');
    
    
    //Route::post('dashboard/destroy-item', [UserController::class, 'destroy'])->name('destroy.item');
});

