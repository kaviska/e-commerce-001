<?php

use App\Livewire\Admin;
use App\Livewire\AdminLogin;
use App\Livewire\Home;
use App\Livewire\Product;
use App\Livewire\Register;
use App\Livewire\Signin;
use App\Livewire\Cart;
use App\Livewire\AllProduct;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::get('/register',Register::class);
Route::get('/login',Signin::class)->name('login');
Route::get('/product/{id}',Product::class);
Route::get('/cart',Cart::class);
//allProduct
Route::get('/allProduct/{id}',AllProduct::class);
Route::get('/admin',Admin::class);
//admin-login
Route::get('/adminLogin',function(){
    return view('adminLogin');
});