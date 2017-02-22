<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesAddCategoryIdTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('petshops_categories', function($table) {
        $table->integer('parent_category_id')->unsigned()->nullable();
        $table->foreign('parent_category_id')->references('id')->on('petshops_categories');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('petshops_categories', function($table) {
          $table->dropForeign(['parent_category_id']);
          $table->dropColumn('parent_category_id');
      });

    }
}
