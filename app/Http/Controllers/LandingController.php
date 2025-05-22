<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    /**
     * Show the landing page with product listings.
     */
    public function index()
    {
        $products = Product::all();
        return view('landing', compact('products'));
    }
}
