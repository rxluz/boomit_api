<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

*/



Route::group(['prefix' => 'v1'], function () {

  $response["200"]=function(){
    return response("", 200);
  };

  // Route::group([
  //     'prefix' => 'users',
  // ], function ($router) {
  //     require base_path('routes/api/admin/users.php');
  // });
  //
  //
  // Route::group([
  //     'prefix' => 'categories',
  // ], function ($router) {
  //     require base_path('routes/api/admin/categories.php');
  // });
  //
  //
  //
  // Route::group([
  //     'prefix' => 'orders',
  // ], function ($router) {
  //     require base_path('routes/api/admin/orders.php');
  // });
  //
  //
  // Route::group([
  //     'prefix' => 'petshops',
  // ], function ($router) {
  //     require base_path('routes/api/admin/petshops.php');
  // });

});
