<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| USER ADDRESS Routes
|--------------------------------------------------------------------------
|
*/

Route::get('', 'App\UserController@addressIndex')
->middleware(
  'exists.data:table=users_address,field=user_id,value=const@USER_ID'
);

Route::get('{address_id}', 'App\UserController@addressShow')
  ->middleware(
    'row.exists:table=users_address,field=id,value=param@address_id,and=user_id,and_value=const@USER_ID'
  );

Route::post('', 'App\UserController@addressStore');

Route::patch('{address_id}', 'App\UserController@addressUpdate')
  ->middleware(
    'row.exists:table=users_address,field=id,value=param@address_id,and=user_id,and_value=const@USER_ID'
  );

Route::delete('{address_id}', $response["200"])
  ->middleware(
    'row.exists:table=users_address,field=id,value=param@address_id,and=user_id,and_value=const@USER_ID',
    'row.delete:table=users_address,field=id,value=param@address_id,and=user_id,and_value=const@USER_ID'
  );
