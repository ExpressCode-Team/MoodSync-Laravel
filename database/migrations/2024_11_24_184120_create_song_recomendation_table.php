<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongRecomendationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_recommendations', function (Blueprint $table) {
            $table->id('recommendation_id');
            $table->unsignedBigInteger('user_id');
            $table->string('song_id');
            $table->integer('like');
            $table->timestamp('recommendation_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_recommendations');
    }
}
