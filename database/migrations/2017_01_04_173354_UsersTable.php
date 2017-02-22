<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->longText('access_token')->nullable();
          $table->longText('admin_token')->nullable();
          $table->longText('facebook_token')->nullable();
          $table->boolean('admin')->default("0");
          $table->boolean('active')->default("1");

          $table->integer('petshop_id')->nullable()->unsigned();
          $table->foreign('petshop_id')->references('id')->on('petshops');

          //$table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
