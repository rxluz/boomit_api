<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsOpeningHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('petshops_openinghours', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('petshop_id')->unsigned();
          $table->foreign('petshop_id')->references('id')->on('petshops');

          //weekdays name or "holiday"
          $table->string('day');
          $table->string('hour_init');
          $table->string('hour_end');

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
        Schema::dropIfExists('petshops_openinghours');
    }
}
