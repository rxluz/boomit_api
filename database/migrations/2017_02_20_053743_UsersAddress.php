<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_address', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          $table->string('name');
          $table->mediumText('address')->nullable();
          $table->string('number')->nullable();
          $table->string('ajunct')->nullable();
          $table->string('zip_code')->nullable();
          $table->string('lat')->nullable();
          $table->bigInteger('long')->nullable();
          $table->string('city')->nullable();
          $table->char('state', 2)->nullable();

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
        //
        Schema::dropIfExists('users_address');
    }
}
