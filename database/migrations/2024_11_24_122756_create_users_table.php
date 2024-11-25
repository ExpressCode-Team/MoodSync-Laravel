<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('spotify_id')->unique();
            $table->string('name', 255);
            $table->string('images', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('external_urls', 255)->nullable();
            $table->integer('followers')->default(0);
            $table->string('password')->nullable();
            $table->integer('role')->default(0);
            $table->string('country', 2); 
            $table->string('product');
            $table->timestamps(); 
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}