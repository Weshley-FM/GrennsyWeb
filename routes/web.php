<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'landing']);

Route::get('/', function () {
    $products = Product::all();
    return view('landing', compact('products'));
});

Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);

