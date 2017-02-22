<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('petshops_products', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('petshop_id')->unsigned();
           $table->foreign('petshop_id')->references('id')->on('petshops');

           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');

           $table->string('name');
           $table->string('brand')->nullable();
           $table->mediumText('especifications')->nullable();
           $table->mediumText('picture')->nullable();
           $table->integer('stock_low')->default(0);

           $table->char('active', 1)->default('1');

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
         Schema::dropIfExists('petshops_products');
     }
}
