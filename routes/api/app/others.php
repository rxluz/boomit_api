<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| OTHERS Routes
|--------------------------------------------------------------------------
|
*/

Route::post('contacts', 'App\OthersController@storeContacts');
Route::get('test', function(){
  echo
    set__rule('namerule')
    ->type('typeanyone')
    ->table(get__param('teste'))
    ->fields(
      [
        ["name" => "test", "value" => get__const('value1')],
        ["name" => "test1", "value" => get__const('value2')],
        ["name" => "test1", "value" => get__const('value3')]
      ]
    )
    ->excepts(
      [
        ["name" => "excepttest", "value" => get__const('exceptvalue1')]
      ]
    );
});
