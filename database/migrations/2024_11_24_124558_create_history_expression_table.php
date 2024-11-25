<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryExpressionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_expressions', function (Blueprint $table) {
            $table->id('history_expression_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('expression_id'); 
            $table->timestamps(); 
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('expression_id')->references('expression_id')->on('expressions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_expression');
    }
}
