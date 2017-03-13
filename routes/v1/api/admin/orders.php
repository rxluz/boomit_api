<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| ORDERS ADMIN Routes
|--------------------------------------------------------------------------
|

*/



/* -------------------- orders admin routes --------------- */
Route::get('', 'Admin\OrdersController@index');
Route::get('{order_id}', 'Admin\OrdersController@show');
//unconfirm
Route::delete('{order_id}', $response["200"]);
//confirm
Route::put('{order_id}', $response["200"])->middleware('onlyAdmin:all');
