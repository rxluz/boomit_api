<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsProductsPromotionsTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('petshops_products_stocks_promotions', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('petshops_products');

          $table->integer('product_stocks_id')->unsigned();
          $table->foreign('product_stocks_id')->references('id')->on('petshops_products_stocks');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');


          //0 percent 1 value
          $table->char('type', 1)->default('1');
          $table->decimal('percent', 5, 2);
          $table->decimal('value', 8, 2);

          $table->decimal('price', 8, 2);
          $table->dateTime('expires');

          $table->char('active', 1)->default('1');
          $table->char('approved', 1)->default('0');

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
        Schema::dropIfExists('petshops_products_promotions');
    }
}
