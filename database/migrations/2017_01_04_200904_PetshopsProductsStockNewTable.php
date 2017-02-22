<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsProductsStockNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('petshops_products_stocks');
      Schema::create('petshops_products_stocks', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('petshops_products');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          $table->string('description');

          $table->integer('current_stock');
          $table->decimal('price', 8, 2);

          $table->char('approved', 1)->default('1');
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
        Schema::dropIfExists('petshops_products_stocks');
    }
}
