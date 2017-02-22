<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| USER pets Routes
|--------------------------------------------------------------------------
|
*/

Route::get('', 'App\UserController@petsIndex')
->middleware(
  'exists.data:table=users_pets,field=user_id,value=const@USER_ID'
);

Route::get('{pets_id}', 'App\UserController@petsShow')
  ->middleware(
    'row.exists:table=users_pets,field=id,value=param@pets_id,and=user_id,and_value=const@USER_ID'
  );

Route::post('', 'App\UserController@petsStore');

Route::patch('{pets_id}', 'App\UserController@petsUpdate')
  ->middleware(
    'row.exists:table=users_pets,field=id,value=param@pets_id,and=user_id,and_value=const@USER_ID'
  );

Route::delete('{pets_id}', $response["200"])
  ->middleware(
    'row.exists:table=users_pets,field=id,value=param@pets_id,and=user_id,and_value=const@USER_ID',
    'row.delete:table=users_pets,field=id,value=param@pets_id,and=user_id,and_value=const@USER_ID'
  );
