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
        Schema::create('music_tracks', function (Blueprint $table) {
            $table->id(); // ID unik untuk setiap track musik
            $table->string('title'); // Judul lagu
            $table->string('artist')->nullable(); // Nama artis, bisa kosong
            $table->string('album')->nullable(); // Nama album, bisa kosong
            $table->string('genre')->nullable(); // Genre lagu, bisa kosong
            $table->string('url')->nullable(); // URL streaming atau lokasi file, bisa kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_tracks');
    }
};
