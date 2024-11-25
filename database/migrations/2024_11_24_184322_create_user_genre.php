<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGenre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_genres', function (Blueprint $table) {
            $table->id('user_genre_id');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('genre_id'); 
            $table->timestamps(); 
            $table->softDeletes(); 

            // Foreign key constraints (opsional)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('genre_id')->references('genre_id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_genres');
    }
}
