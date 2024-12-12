<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('furniture', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama furnitur
            $table->string('type'); // Jenis furnitur, misalnya kursi, meja
            $table->text('description'); // Deskripsi furnitur
            $table->decimal('price', 10, 2); // Harga furnitur
            $table->string('image')->nullable(); // Gambar furnitur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furniture');
    }
};
