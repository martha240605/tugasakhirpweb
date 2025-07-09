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
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');  
            $table->enum ('jenis', ['Badminton', 'Futsal', 'Voli', 'Tenis', 'Basket']);                   
            $table->integer('harga_per_jam'); 
            $table->text('deskripsi')->nullable();     
            $table->string('gambar')->nullable();       
            $table->enum('status', ['Tersedia', 'Disewa'])->default('Tersedia'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangans');
    }
};
