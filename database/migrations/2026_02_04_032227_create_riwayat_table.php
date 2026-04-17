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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();   // path gambar
            $table->string('nama');                 // nama kegiatan/menu
            $table->text('deskripsi')->nullable();  // deskripsi
            $table->string('lokasi');               // lokasi
            $table->date('tanggal');                // tanggal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
