<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| PETSHOPS PRODUCTS ADMIN Routes
|--------------------------------------------------------------------------
|
*/


Route::group([
    'prefix' => '{product_id}',
], function ($router) {
  Route::group([
      'prefix' => 'stocks',
  ], function ($router) {
      require base_path('routes/api/admin/petshops.products.stocks.php');
  });


});


  /* -------------------- products admin routes --------------- */
  Route::get('', 'Admin\ProductsController@index')
    ->middleware(
      'only.admin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists.data:petshops_products,petshop_id,param@petshop_id'
    );

  Route::get('{product_id}', 'Admin\ProductsController@show')
    ->middleware(
      'only.admin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1'
    );

  Route::post('', 'Admin\ProductsController@store')
    ->middleware(
      'only.admin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );

  Route::patch('{product_id}', 'Admin\ProductsController@update')
    ->middleware(
      'only.admin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1'
    );

  Route::delete('{product_id}', $response["200"])
  ->middleware(
    'only.admin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1',
    'set.field:product_id,petshops_products,id,active,0'
  );

  Route::put('{product_id}', $response["200"])
    ->middleware(
      'only.admin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,0',
      'set.field:product_id,petshops_products,id,active,1'
    );
