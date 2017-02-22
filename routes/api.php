<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

*/


Route::get('/ola', function () {
  echo "ola mundo";
  exit;
    //return view('welcome');
});


Route::group(['prefix' => 'v1/admin'], function () {
  $response["200"]=function(){
    return response("", 200);
  };

  /* -------------------- user admin routes --------------- */
  Route::post('user/auth', 'UserController@auth');
  Route::get('users', 'UserController@index');
  Route::get('user/{user_id}', 'UserController@show');
  Route::post('user', 'UserController@store');
  Route::patch('user/{user_id}', 'UserController@update');
  Route::delete('user/{user_id}', 'UserController@destroy');
  Route::put('user/{user_id}', 'UserController@restore')->middleware('onlyAdmin:all');


  /* -------------------- categories admin routes --------------- */
  Route::get('categories', 'CategoryController@index')
    ->middleware(
      'onlyAdmin:all',
      'tableLoaded:petshops_categories'
    );

  Route::get('category/{category_id}', 'CategoryController@show')
    ->middleware(
      'onlyAdmin:all',
      'exists:category_id, petshops_categories,id'
    );

  Route::post('category', 'CategoryController@store')->middleware('onlyAdmin:all');

  Route::patch('category/{category_id}', 'CategoryController@update')
    ->middleware(
      'onlyAdmin:all',
      'exists:category_id, petshops_categories,id,active,1'
    );

  Route::delete('category/{category_id}', $response["200"])
    ->middleware(
      'onlyAdmin:all',
      'exists:category_id, petshops_categories,id,active,1',
      'setField:category_id,petshops_categories,id,active,0'
    );

  Route::put('category/{category_id}', $response["200"])
    ->middleware(
      'onlyAdmin:all',
      'exists:category_id,petshops_categories,id,active,0',
      'setField:category_id,petshops_categories,id,active,1'
    );


  /* -------------------- orders admin routes --------------- */
  Route::get('orders', 'OrdersController@index');
  Route::get('order/{order_id}', 'OrdersController@show');
  //unconfirm
  Route::delete('order/{order_id}', $response["200"]);
  //confirm
  Route::put('order/{order_id}', $response["200"])->middleware('onlyAdmin:all');


  /* -------------------- petshop admin routes --------------- */
  Route::get('petshops', 'PetshopController@index')
    ->middleware(
      'onlyAdmin:super',
      'tableLoaded:petshops'
    );

  Route::get('petshop', 'PetshopController@single')->middleware('onlyAdmin:petshop');

  Route::get('petshop/{petshop_id}', 'PetshopController@show')
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id'
    );

  Route::post('petshop', 'PetshopController@store')->middleware('onlyAdmin:super');

  Route::patch('petshop/{petshop_id}', 'PetshopController@update')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );

  Route::delete('petshop/{petshop_id}', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,1',
      'setField:petshop_id,petshops,id,active,0'
    );


  Route::put('petshop/{petshop_id}', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,0',
      'setField:petshop_id,petshops,id,active,1'
    );


  /* -------------------- petshop admin areas  routes --------------- */
  Route::get('petshop/{petshop_id}/areas', 'PetshopController@indexAreas')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'tableLoaded:petshops_areas,petshop_id,param@petshop_id'
    );

  Route::post('petshop/{petshop_id}/area', 'PetshopController@storeArea')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );

  Route::patch('petshop/{petshop_id}/area/{area_id}', 'PetshopController@updateArea')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:area_id,petshops_areas,id,petshop_id,!petshop_id'
    );

  Route::delete('petshop/{petshop_id}/area/{area_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:area_id,petshops_areas,id,petshop_id,!petshop_id',
      'delRow:area_id,petshops_areas,id'

    );

/* -------------------- petshop admin openinghours  routes --------------- */
  Route::get('petshop/{petshop_id}/openinghours', 'PetshopController@indexOpeningHours')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'tableLoaded:petshops_openinghours,petshop_id,param@petshop_id'
    );


  Route::post('petshop/{petshop_id}/openinghour', 'PetshopController@storeOpeningHour')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );


  Route::delete('petshop/{petshop_id}/openinghour/{openinghours_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:openinghours_id,petshops_openinghours,id',
      'delRow:openinghours_id,petshops_openinghours,id'
    );

  /* -------------------- petshop admin rating  routes --------------- */
  Route::get('petshop/{petshop_id}/ratings', 'PetshopController@ratingShow')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'tableLoaded:petshops_ratings,petshop_id,param@petshop_id'
    );

  Route::patch('petshop/{petshop_id}/rating/{rating_id}', 'PetshopController@ratingUpdate')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:rating_id,petshops_ratings,id,active,1'
    );

  Route::put('petshop/{petshop_id}/rating/{rating_id}', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,1',
      'exists:rating_id,petshops_ratings,id,active,0',
      'setField:rating_id,petshops_ratings,id,active,1'
    );

  Route::delete('petshop/{petshop_id}/rating/{rating_id}', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,1',
      'exists:rating_id,petshops_ratings,id,active,1',
      'setField:rating_id,petshops_ratings,id,active,0'
    );



  /* -------------------- products admin routes --------------- */
  Route::get('petshop/{petshop_id}/products', 'ProductsController@index')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'tableLoaded:petshops_products,petshop_id,param@petshop_id'
    );

  Route::get('petshop/{petshop_id}/product/{product_id}', 'ProductsController@show')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1'
    );

  Route::post('petshop/{petshop_id}/product', 'ProductsController@store')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );

  Route::patch('petshop/{petshop_id}/product/{product_id}', 'ProductsController@update')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1'
    );

  Route::delete('petshop/{petshop_id}/product/{product_id}', $response["200"])
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1',
    'setField:product_id,petshops_products,id,active,0'
  );

  Route::put('petshop/{petshop_id}/product/{product_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,0',
      'setField:product_id,petshops_products,id,active,1'
    );


  /* -------------------- products admin stock routes --------------- */
  Route::get('petshop/{petshop_id}/product/{product_id}/stocks', 'ProductsController@stockIndex')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'tableLoaded:petshops_products_stocks,product_id,param@product_id'
    );

  Route::post('petshop/{petshop_id}/product/{product_id}/stock', 'ProductsController@stockStore')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1'
    );

  Route::patch('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}', 'ProductsController@stockUpdate')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1'
    );

  Route::put('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,0',
      'setField:stock_id,petshops_products_stocks,id,active,1'
    );

  Route::delete('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}', function(){return response('', 200);})
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1',
      'setField:stock_id,petshops_products_stocks,id,active,0'
    );



  /* -------------------- products admin promotion routes --------------- */
  Route::get('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}/promotions', 'ProductsController@promotionIndex')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1',
      'tableLoaded:petshops_products_stocks_promotions,product_stocks_id,param@stock_id'
    );

  Route::post('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}/promotion', 'ProductsController@promotionStore')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1'
    );



  Route::put('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}/promotion/{promotion_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1',
      'exists:promotion_id,petshops_products_stocks_promotions,id,product_stocks_id,!stock_id',
      'exists:promotion_id,petshops_products_stocks_promotions,id,active,0',
      'setField:promotion_id,petshops_products_stocks_promotions,id,active,1'
    );

  Route::put('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}/promotion/{promotion_id}/allow', $response["200"])
    ->middleware(
      'onlyAdmin:super',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1',
      'exists:promotion_id,petshops_products_stocks_promotions,id,product_stocks_id,!stock_id',
      'exists:promotion_id,petshops_products_stocks_promotions,id,approved,0',
      'setField:promotion_id,petshops_products_stocks_promotions,id,approved,1'
    );

  Route::delete('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}/promotion/{promotion_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1',
      'exists:promotion_id,petshops_products_stocks_promotions,id,product_stocks_id,!stock_id',
      'exists:promotion_id,petshops_products_stocks_promotions,id,active,1',
      'setField:promotion_id,petshops_products_stocks_promotions,id,active,0'
    );


  Route::delete('petshop/{petshop_id}/product/{product_id}/stock/{stock_id}/promotion/{promotion_id}/block', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
      'exists:product_id,petshops_products,id,active,1',
      'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
      'exists:stock_id,petshops_products_stocks,id,active,1',
      'exists:promotion_id,petshops_products_stocks_promotions,id,product_stocks_id,!stock_id',
      'exists:promotion_id,petshops_products_stocks_promotions,id,approved,1',
      'setField:promotion_id,petshops_products_stocks_promotions,id,approved,0'
    );
});
