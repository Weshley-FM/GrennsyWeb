<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable(); // Jika ada tabel products
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('price_per_unit', 10, 2);
            $table->decimal('total_price', 10, 2); // quantity * price_per_unit
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // Jika ada tabel 'products', Anda bisa tambahkan foreign key ke sana juga
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};