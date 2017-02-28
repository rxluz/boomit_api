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
Route::get('test/{testparam?}', function(){
  echo
    set__rule('namerule')
    ->type('typeanyone')
    ->table(get__param('testparam'))
    ->fields(
      [
        ["name" => is__between(0, 50), "value" => get__const('value1')],
        ["name" => is__smaller(get__const('value3')), "value" => get__const('value2')],
        ["name" => "test1", "value" => get__const('value3')]
      ]
    )
    ->excepts(
      [
        ["name" => is__greater("450"), "value" => get__const('exceptvalue1')]
      ]
    );
});
