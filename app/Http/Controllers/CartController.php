<?php

// File: app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Ambil data cart dari session atau database
        $cartItems = session()->get('cart', []);
        $cartCount = count($cartItems);
        
        // Kembalikan view ke transaction/cart.blade.php
        return view('transaction.cart', compact('cartItems', 'cartCount'));
    }
    
    public function update(Request $request)
    {
        // Logic untuk update cart
        // Implementasi sesuai kebutuhan
        
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully');
    }
    
    public function remove($id)
    {
        // Logic untuk menghapus item dari cart
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }
}