<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->integer('position')->default(0)->unsigned();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('topic_id')->references('id')->on('topics');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
