<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Livewire\Signin;
use App\Http\Controllers\SubCategoryController;

//products api
Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::put('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'destroy']); 
    Route::post('/changeStatus', [ProductController::class, 'changeStatus']);
});
Route::get('/login', [Signin::class, 'login']);


//user api
Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'index']);
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/issLogin', [UserController::class, 'issLogin']);
    Route::put('/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/{user}', [UserController::class, 'destroy'])->middleware('auth:sanctum');
});

//create cart route
Route::prefix('carts')->middleware('auth:sanctum')->group(function(){
    Route::get('/', [CartController::class, 'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::get('/{cart}', [CartController::class, 'show']);
    Route::put('/{cart}', [CartController::class, 'update']);
    Route::delete('/{cart}', [CartController::class, 'destroy']);
});
//sub category api
Route::prefix('subcategories')->group(function(){
    Route::get('/', [SubCategoryController::class, 'index']);
    Route::post('/', [SubCategoryController::class, 'store']);
    Route::get('/{subCategory}', [SubCategoryController::class, 'show']);
    Route::put('/{subCategory}', [SubCategoryController::class, 'update']);
    Route::delete('/{subCategory}', [SubCategoryController::class, 'destroy']);
});
