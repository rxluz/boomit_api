<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| PETSHOPS PRODUCTS STOCKS (AND PROMOTIONS) ADMIN Routes
|--------------------------------------------------------------------------
|
*/
/* -------------------- products admin stock routes --------------- */
Route::get('', 'Admin\ProductsController@stockIndex')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1',
    'tableLoaded:petshops_products_stocks,product_id,param@product_id'
  );

Route::post('', 'Admin\ProductsController@stockStore')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1'
  );

Route::patch('{stock_id}', 'Admin\ProductsController@stockUpdate')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1',
    'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
    'exists:stock_id,petshops_products_stocks,id,active,1'
  );

Route::put('{stock_id}', $response["200"])
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
    'exists:stock_id,petshops_products_stocks,id,active,0',
    'setField:stock_id,petshops_products_stocks,id,active,1'
  );

Route::delete('{stock_id}', $response["200"])
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
    'exists:stock_id,petshops_products_stocks,id,active,1',
    'setField:stock_id,petshops_products_stocks,id,active,0'
  );



/* -------------------- products admin promotion routes --------------- */
Route::get('{stock_id}/promotions', 'Admin\ProductsController@promotionIndex')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1',
    'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
    'exists:stock_id,petshops_products_stocks,id,active,1',
    'tableLoaded:petshops_products_stocks_promotions,product_stocks_id,param@stock_id'
  );

Route::post('{stock_id}/promotions', 'Admin\ProductsController@promotionStore')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:product_id,petshops_products,id,petshop_id,!petshop_id',
    'exists:product_id,petshops_products,id,active,1',
    'exists:stock_id,petshops_products_stocks,id,product_id,!product_id',
    'exists:stock_id,petshops_products_stocks,id,active,1'
  );



Route::put('{stock_id}/promotions/{promotion_id}', $response["200"])
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

Route::put('{stock_id}/promotions/{promotion_id}/allow', $response["200"])
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

Route::delete('{stock_id}/promotions/{promotion_id}', $response["200"])
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


Route::delete('{stock_id}/promotions/{promotion_id}/block', $response["200"])
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
