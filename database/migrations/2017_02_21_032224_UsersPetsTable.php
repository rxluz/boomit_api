<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_pets', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          
          $table->string('name');
          $table->char('type', 1)->nullable();
          $table->string('picture');
          $table->boolean('active', 1)->default('1');

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
        Schema::dropIfExists('users_pets');
    }
}
