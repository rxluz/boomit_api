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

Route::post('contacts', function(){
  return response('ola', 200);
});

Route::post('shell', 'App\OthersController@storeShell');


// Route::post('test/{testparam?}', function(){
//   echo
//     __rule('data')
//     ->type('exists')
//     ->table("users")
//     ->fields(
//       [
//         ["name" => "id", "value" => is__greater(get__post("min_id"))],
//         ["name" => "id", "value" => is__different(get__post("min_id"))],
//         ["name" => "id", "value" => is__value(get__post("min_id"))],
//       ]
//     )
//     ->response(412);
// });
