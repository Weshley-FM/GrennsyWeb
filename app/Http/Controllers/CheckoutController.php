<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user_id jika login

class CheckoutController extends Controller
{
    // Method untuk menampilkan halaman checkout (opsional, karena Anda sudah punya HTML-nya)
    public function index()
    {
        // Anda bisa pass data keranjang dari session atau database ke view di sini
        $cartItems = [
            // Contoh data dummy, aslinya dari session/database
            ['id' => 1, 'name' => 'Bayam Segar', 'price' => 8000, 'quantity' => 2],
            ['id' => 2, 'name' => 'Wortel Organik', 'price' => 12000, 'quantity' => 1],
            ['id' => 3, 'name' => 'Brokoli Hijau', 'price' => 15000, 'quantity' => 1],
            ['id' => 4, 'name' => 'Tomat Merah', 'price' => 10000, 'quantity' => 2],
        ];

        // Hitung subtotal dan total
        $subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
        $shippingCost = 10000;
        $totalAmount = $subtotal + $shippingCost;

        return view('cart', compact('cartItems', 'subtotal', 'shippingCost', 'totalAmount'));
    }

    // Method untuk memproses pesanan dan menyimpannya ke database
    public function store(Request $request)
    {
        // 1. Validasi data input
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'notes' => 'nullable|string|max:500',
            'payment_method' => 'required|string|in:cod,transfer,ewallet,qris',
            // Anda perlu mengirimkan data item keranjang dari frontend ke backend
            // atau mengambilnya dari session/database
            'cart_items' => 'required|array',
            'cart_items.*.id' => 'required|integer',
            'cart_items.*.name' => 'required|string',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.price' => 'required|numeric|min:0',
        ]);

        // Hitung ulang subtotal dan total di backend untuk keamanan
        $subtotal = 0;
        foreach ($validatedData['cart_items'] as $item) {
            $subtotal += ($item['quantity'] * $item['price']);
        }
        $shippingCost = 10000; // Contoh, bisa dari konfigurasi
        $totalAmount = $subtotal + $shippingCost;

        // 2. Buat entri baru di tabel 'orders'
        $order = Order::create([
            'user_id' => Auth::id(), // Akan null jika pengguna tidak login
            'full_name' => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'postal_code' => $validatedData['postal_code'],
            'notes' => $validatedData['notes'],
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total_amount' => $totalAmount,
            'payment_method' => $validatedData['payment_method'],
            'status' => 'pending', // Status awal
        ]);

        // 3. Simpan setiap item di keranjang ke tabel 'order_items'
        foreach ($validatedData['cart_items'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'], // Asumsi ID produk ada
                'product_name' => $item['name'],
                'quantity' => $item['quantity'],
                'price_per_unit' => $item['price'],
                'total_price' => $item['quantity'] * $item['price'],
            ]);
        }

        // 4. Bersihkan keranjang (jika menggunakan session/database keranjang)
        // Contoh: $request->session()->forget('cart');

        // 5. Berikan respons sukses
        return response()->json([
            'message' => 'Pesanan berhasil ditempatkan!',
            'order_id' => $order->id,
            'redirect_url' => route('order.success', $order->id) // Arahkan ke halaman sukses
        ], 200);

        // Atau jika menggunakan redirect biasa
        // return redirect()->route('order.success', $order->id)
        //                  ->with('success', 'Pesanan berhasil ditempatkan!');
    }
}