<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('petshops_products_categories', function (Blueprint $table) {
          $table->integer('petshop_product_id')->unsigned();
          $table->foreign('petshop_product_id')->references('id')->on('petshops_products');

          $table->integer('petshop_category_id')->unsigned();
          $table->foreign('petshop_category_id')->references('id')->on('petshops_categories');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petshops_products_categories');
    }
}
