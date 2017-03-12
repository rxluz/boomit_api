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

Route::post('shell_quiz', function(){
  return response('olar mundo', 200);
});

// Route::post('test/{testparam?}', function(){
//   echo
//     set__rule('data')
//     ->type('exists')
//     ->table("users")
//     ->fields(
//       [
//         ["name" => "id", "value" => is__greater(get__post("min_id"))]
//       ]
//     )
//     ->excepts(
//       [
//         ["name" => "active", "value" => is__value("1")]
//       ]
//     );
// });
