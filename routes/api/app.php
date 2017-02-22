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

  Route::group([
      'prefix' => 'user',
  ], function ($router) {
      require base_path('routes/api/app/user.php');
  });

  Route::group([
      'prefix' => 'petshops',
  ], function ($router) {
      require base_path('routes/api/app/petshops.php');
  });


  Route::group([
      'prefix' => 'orders',
  ], function ($router) {
      require base_path('routes/api/app/orders.php');
  });


  Route::group([
      'prefix' => 'others',
  ], function ($router) {
      require base_path('routes/api/app/others.php');
  });

});
