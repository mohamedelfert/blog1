<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('add_by')->unsigned();
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news_models')->onDelete('cascade');
            $table->longText('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_models');
    }
}
