<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_book', function (Blueprint $table) {
            $table->increments('user_book_id');
            $table->integer('user')->unsigned();
            $table->integer('book')->unsigned();
            $table->boolean('owned');
            $table->boolean('read');
            $table->boolean('wishlist');
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('book')->references('book_id')->on('book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_book');
    }
}
