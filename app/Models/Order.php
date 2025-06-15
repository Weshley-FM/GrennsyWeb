<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone_number',
        'address',
        'city',
        'postal_code',
        'notes',
        'subtotal',
        'shipping_cost',
        'total_amount',
        'payment_method',
        'status',
    ];

    // Definisi relasi: Sebuah order memiliki banyak order items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Definisi relasi: Sebuah order dimiliki oleh satu user (opsional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}