<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| USER Routes
|--------------------------------------------------------------------------
|
*/

Route::group([
    'prefix' => 'address',
    'middleware' => 'logged'
], function ($router) {
    require base_path('routes/api/app/user.address.php');
});

Route::group([
    'prefix' => 'pets',
    'middleware' => 'logged'
], function ($router) {
    require base_path('routes/api/app/user.pets.php');
});

Route::get('', 'App\UserController@show')
  ->middleware(['logged']);

Route::post('', 'App\UserController@store');

Route::post('auth', 'App\UserController@auth');

Route::patch('', 'App\UserController@update')
  ->middleware([
    'logged'
  ]);

Route::delete('', $response["200"])
  ->middleware([
    'logged',
    'exists:const=USER_ID,table=users,field=id,field=active,value=1',
    'set.field:table=users,field=active,value=0,where=id,where_value=const@USER_ID'
  ]);
