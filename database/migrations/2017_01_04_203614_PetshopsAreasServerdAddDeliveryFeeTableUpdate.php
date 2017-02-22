<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PetshopsAreasServerdAddDeliveryFeeTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('petshops_areas', function($table) {
        $table->decimal('delivery_fee', 8, 2);

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('petshops_areas', function($table) {
          $table->dropColumn('delivery_fee');
      });

    }
}
