<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| CATEGORIES ADMIN Routes
|--------------------------------------------------------------------------
|

*/

Route::get('', 'Admin\CategoryController@index')
  ->middleware(
    'onlyAdmin:all',
    'tableLoaded:petshops_categories'
  );

Route::get('{category_id}', 'Admin\CategoryController@show')
  ->middleware(
    'onlyAdmin:all',
    'exists:category_id, petshops_categories,id'
  );

Route::post('', 'Admin\CategoryController@store')->middleware('onlyAdmin:all');

Route::patch('{category_id}', 'Admin\CategoryController@update')
  ->middleware(
    'onlyAdmin:all',
    'exists:category_id, petshops_categories,id,active,1'
  );

Route::delete('{category_id}', $response["200"])
  ->middleware(
    'onlyAdmin:all',
    'exists:category_id, petshops_categories,id,active,1',
    'setField:category_id,petshops_categories,id,active,0'
  );

Route::put('{category_id}', $response["200"])
  ->middleware(
    'onlyAdmin:all',
    'exists:category_id,petshops_categories,id,active,0',
    'setField:category_id,petshops_categories,id,active,1'
  );
