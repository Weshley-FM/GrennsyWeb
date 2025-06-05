<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        // Assuming user cart is stored in session or database
        $cartItems = CartItem::with('product')->where('user_id', auth()->id())->get();

        return view('transaction', compact('cartItems'));
    }

    public function update(Request $request)
    {
        foreach ($request->quantities as $itemId => $qty) {
            $item = CartItem::find($itemId);
            if ($item && $item->user_id === auth()->id()) {
                $item->quantity = max(1, intval($qty));
                $item->save();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $item = CartItem::find($id);
        if ($item && $item->user_id === auth()->id()) {
            $item->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {
        // Placeholder: show checkout form or confirmation
        return view('checkout');
    }
}

