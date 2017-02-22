<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| USER Routes
|--------------------------------------------------------------------------
|
*/


Route::get('', 'App\PetshopsController@index');
Route::get('/promotions', 'App\PetshopsController@indexPromotions');



Route::get('byaddress/{address_id}', 'App\PetshopsController@indexPetshopsByAddress')
->middleware([
  'logged',
  'exists.data:table=users_address,field=id,value=param@address_id,where=user_id,where_value=const@USER_ID'
]);

Route::get('promotions/byaddress/{address_id}', 'App\PetshopsController@indexPromotionsByAddress')
->middleware(
  'logged',
  'exists.data:table=users_address,field=id,value=param@address_id,where=user_id,where_value=const@USER_ID'
);

Route::group([
    'prefix' => '{petshop_id}/categories',
    'middleware' => 'row.exists:table=petshops,field=id,value=param@petshop_id,and=active,and_value=1'
], function ($router) {

  Route::get('', 'App\PetshopsController@indexCategories');

  Route::get('{category_id}/products', 'App\PetshopsController@indexCategoriesProducts')
  ->middleware(
    'row.exists:table=petshops_categories,field=id,value=param@category_id,and=active,and_value=1'
  );

});

Route::group([
    'prefix' => '{petshop_id}',
    'middleware' => [
      'row.exists:table=petshops,field=id,value=param@petshop_id,and=active,and_value=1'
    ]
], function ($router) {
  Route::get('', 'App\PetshopsController@show')
  ->middleware(
    'row.exists:table=petshops,field=id,value=param@petshop_id,and=active,and_value=1'
  );

  Route::get('/ratings', 'App\PetshopsController@indexRatings')
  ->middleware(
    'row.exists:table=petshops_ratings,field=petshop_id,value=param@petshop_id,and=active,and_value=1'
  );

  Route::post('/ratings', 'App\PetshopsController@storeRatings')
  ->middleware([
    'logged',
    'row.delete:table=petshops_ratings
,field=user_id,value=const@USER_ID,and=petshop_id,and_value=param@petshop_id'
  ]);

  Route::get('byaddress/{address_id}', 'App\PetshopsController@showPetshopsByAddress')
  ->middleware(
    'logged',
    'exists.data:table=users_address,field=id,value=param@address_id,where=user_id,where_value=const@USER_ID'
  );

});
