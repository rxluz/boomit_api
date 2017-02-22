<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| PETSHOPS RATINGS ADMIN Routes
|--------------------------------------------------------------------------
|
*/

/* -------------------- petshop admin rating  routes --------------- */
Route::get('', 'Admin\PetshopController@ratingShow')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'tableLoaded:petshops_ratings,petshop_id,param@petshop_id'
  );

Route::patch('{rating_id}', 'Admin\PetshopController@ratingUpdate')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:rating_id,petshops_ratings,id,active,1'
  );

Route::put('{rating_id}', $response["200"])
  ->middleware(
    'onlyAdmin:super',
    'exists:petshop_id,petshops,id,active,1',
    'exists:rating_id,petshops_ratings,id,active,0',
    'setField:rating_id,petshops_ratings,id,active,1'
  );

Route::delete('{rating_id}', $response["200"])
  ->middleware(
    'onlyAdmin:super',
    'exists:petshop_id,petshops,id,active,1',
    'exists:rating_id,petshops_ratings,id,active,1',
    'setField:rating_id,petshops_ratings,id,active,0'
  );
