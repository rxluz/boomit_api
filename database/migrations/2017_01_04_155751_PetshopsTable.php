<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('petshops', function (Blueprint $table) {
          $table->increments('id');
          $table->string('company_name')->unique();
          $table->string('email')->unique();
          $table->string('ie')->unique();
          $table->string('cnpj')->unique();
          $table->string('trade_name');
          $table->string('phone');
          $table->string('address');
          $table->string('google_address');
          $table->string('google_city');
          $table->string('zip_code');

          $table->mediumText('picture')->nullable();
          $table->boolean('active')->default("1");

          //user owner
          // $table->integer('user_id')->unsigned();
          // $table->foreign('user_id')->references('id')->on('users');

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
      Schema::dropIfExists('petshops');
  }
}
