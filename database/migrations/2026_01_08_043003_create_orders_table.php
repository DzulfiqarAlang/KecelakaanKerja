<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecelakaan_kerja_id')->constrained()->onDelete('cascade'); // Relasi ke produk
            $table->string('customer_name');
            $table->text('customer_address');
            $table->integer('quantity');
            $table->enum('payment_method', ['transfer', 'cod']); // Metode Pembayaran
            $table->string('status')->default('pending'); // Status pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
