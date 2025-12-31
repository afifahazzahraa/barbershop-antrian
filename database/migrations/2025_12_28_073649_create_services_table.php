<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');    // Nama layanan (Potong, Shaving, dll)
            $table->integer('price');   // Harga layanan
            $table->timestamps();      // create_at & updated_at
        });
    }

    /**
     * Batalkan migrasi (Hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};