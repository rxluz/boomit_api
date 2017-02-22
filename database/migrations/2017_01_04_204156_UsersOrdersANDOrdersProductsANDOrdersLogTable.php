<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersOrdersANDOrdersProductsANDOrdersLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_orders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          $table->integer('petshop_id')->unsigned();
          $table->foreign('petshop_id')->references('id')->on('petshops');

          $table->string('notes');
          $table->string('address');
          $table->string('address_reference');
          $table->string('google_address');
          $table->decimal('total', 8, 2);
          $table->decimal('delivery_fee', 8, 2);

          //(0 generated, 1 sended, 2 approved, 3 delivered, 4 reproved)
          $table->char('status', 1)->default('1');
          $table->char('payment_method', 2);
          $table->decimal('payment_change', 8, 2);

          $table->char('active', 1)->default('1');
          $table->char('approved', 1)->default('1');

          $table->timestamps();
      });

      Schema::create('users_orders_products', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user_order_id')->unsigned();
          $table->foreign('user_order_id')->references('id')->on('users_orders');

          $table->integer('petshop_product_id')->unsigned();
          $table->foreign('petshop_product_id')->references('id')->on('petshops_products');

          $table->integer('petshop_product_stock_id')->unsigned();
          $table->foreign('petshop_product_stock_id')->references('id')->on('petshops_products_stocks');

          //optional relationship
          $table->integer('petshop_product_promotion_id')->nullable()->unsigned();
          $table->foreign('petshop_product_promotion_id')->references('id')->on('petshops_products_promotions');

          $table->integer('amount');
          $table->decimal('unitary_value', 8, 2);
          $table->decimal('total', 8, 2);
          $table->decimal('discount_value', 8, 2);
      });

      Schema::create('users_orders_log', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user_order_id')->unsigned();
          $table->foreign('user_order_id')->references('id')->on('users_orders');

          $table->char('status', 1)->default('1');
          $table->string('notes');
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
        Schema::dropIfExists('users_orders');
        Schema::dropIfExists('users_orders_products');
        Schema::dropIfExists('users_orders_logs');
    }
}
