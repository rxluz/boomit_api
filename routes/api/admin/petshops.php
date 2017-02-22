<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| PETSHOPS ADMIN Routes
|--------------------------------------------------------------------------
|
*/


Route::group([
    'prefix' => '{petshop_id}',
], function ($router) {
  Route::group([
      'prefix' => 'areas',
  ], function ($router) {
      require base_path('routes/api/admin/petshops.areas.php');
  });

  Route::group([
      'prefix' => 'openinghours',
  ], function ($router) {
      require base_path('routes/api/admin/petshops.openinghours.php');
  });

  Route::group([
      'prefix' => 'ratings',
  ], function ($router) {
      require base_path('routes/api/admin/petshops.ratings.php');
  });

  Route::group([
      'prefix' => 'products',
  ], function ($router) {
      require base_path('routes/api/admin/petshops.products.php');
  });

});



  /* -------------------- petshop admin routes --------------- */
  Route::get('', 'Admin\PetshopController@index')
    ->middleware(
      'onlyAdmin:super',
      'tableLoaded:petshops'
    );

  //Route::get('', 'Admin\PetshopController@single')->middleware('onlyAdmin:petshop');

  Route::get('{petshop_id}', 'Admin\PetshopController@show')
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id'
    );

  Route::post('', 'Admin\PetshopController@store')->middleware('onlyAdmin:super');

  Route::patch('{petshop_id}', 'Admin\PetshopController@update')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );

  Route::delete('{petshop_id}', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,1',
      'setField:petshop_id,petshops,id,active,0'
    );


  Route::put('{petshop_id}', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,0',
      'setField:petshop_id,petshops,id,active,1'
    );
