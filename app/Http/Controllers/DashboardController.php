<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <<< Pastikan Anda mengimpor Model Product Anda

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) // Atau public function index() { ... }
    {
        $products = Product::all(); // Mengambil semua data produk dari database
        return view('dashboard', compact('products')); // Mengirim data produk ke view dashboard.blade.php
    }
}