<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/register', [RegisterController::class, 'register'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
