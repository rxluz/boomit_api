<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| USERS Routes
|--------------------------------------------------------------------------
|

*/


/* -------------------- user admin routes --------------- */
Route::post('auth', 'Admin\UserController@auth');
Route::get('', 'Admin\UserController@index');
Route::get('{user_id}', 'Admin\UserController@show');
Route::post('', 'Admin\UserController@store');
Route::patch('{user_id}', 'Admin\UserController@update');
Route::delete('{user_id}', 'Admin\UserController@destroy');
Route::put('{user_id}', 'Admin\UserController@restore')->middleware('onlyAdmin:all');
