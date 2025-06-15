<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckoutController;

// ==========================================
// ROUTES UNTUK GUEST (Belum Login)
// ==========================================
Route::middleware('guest')->group(function () {
    // Rute Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Rute Register
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'registerPost']);
});

// ==========================================
// ROUTES UMUM (Bisa diakses semua)
// ==========================================
// Rute Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// ==========================================
// ROUTES UNTUK USER YANG SUDAH LOGIN
// ==========================================
Route::middleware(['auth'])->group(function () {
    // Rute Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Rute Dashboard User
    Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
    
    // Rute Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');
    
    // Rute Checkout
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/order-success/{order_id}', function($order_id) {
        return view('order_success', ['order_id' => $order_id]);
    })->name('order.success');
    
    // Rute Profile (jika ada)
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ==========================================
// ROUTES KHUSUS ADMIN
// ==========================================
Route::middleware(['auth', 'admin'])->group(function () {
    // Resource Routes untuk Admin
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});