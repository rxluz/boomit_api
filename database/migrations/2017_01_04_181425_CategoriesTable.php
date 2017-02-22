<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('petshops_categories', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');

          $table->char('animal_type', 1)->default('0');
          $table->char('type', 1);

          //user owner
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          //petshop owner
          $table->integer('petshop_id')->unsigned();
          $table->foreign('petshop_id')->references('id')->on('petshops');

          $table->boolean('active')->default("1");

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
        Schema::dropIfExists('petshops_categories');
    }
}
