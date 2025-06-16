<?php

use App\Http\Controllers\Api\LandingControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

// Route::apiResource('/landing', LandingControllerAPI::class);

Route::apiResource('users', UserController::class);
Route::apiResource('/products', ProductController::class);
