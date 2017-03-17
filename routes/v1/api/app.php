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


  Ro1ute::get('report', function(){
    return 'hello report';
  });

  Route::group([
      'prefix' => 'others',
  ], function ($router) {
      require base_path('routes/api/app/others.php');
  });

});
