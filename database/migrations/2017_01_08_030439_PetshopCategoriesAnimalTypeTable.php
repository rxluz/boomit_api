<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopCategoriesAnimalTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('petshops_categories_types', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('petshops_categories_id')->unsigned();
          $table->foreign('petshops_categories_id')->references('id')->on('petshops_categories');

          //petshop owner
          $table->integer('animal_type')->unsigned();
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('petshops_categories_types');
     }
}
