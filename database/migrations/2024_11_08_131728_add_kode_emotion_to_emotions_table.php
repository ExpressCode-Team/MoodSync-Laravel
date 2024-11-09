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
        Schema::table('emotions', function (Blueprint $table) {
            $table->integer('kode_emotion')->after('name'); // Menambahkan kolom kode_emotion setelah kolom name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emotions', function (Blueprint $table) {
            $table->dropColumn('kode_emotion');
        });
    }
};
