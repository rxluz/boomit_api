<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsAreasServedTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('petshops_areas', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('petshop_id')->unsigned();
        $table->foreign('petshop_id')->references('id')->on('petshops');

        //0 city 1 neighboor 3 street
        $table->string('type');
        //area is covered (1 yes 0 no)
        $table->char('active', 1)->default('1');
        $table->string('google_address');
        $table->string('address');
        $table->string('delivery_time');

        //$table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('petshops_areas');

  }
}
