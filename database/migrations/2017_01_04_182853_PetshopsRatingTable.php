<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('petshops_ratings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('petshop_id')->unsigned();
          $table->foreign('petshop_id')->references('id')->on('petshops');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');

          $table->float('rating', 2, 1);
          $table->mediumText('user_comment');
          $table->mediumText('petshop_comment');

          $table->char('active', 1)->default('0');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petshops_ratings');
    }
}
