<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingControllerAPI extends Controller
{
    /**
     * Show the landing page with product listings.
     */
    public function apiProducts()
{
    $products = Product::all();
    return response()->json($products);
}

}
