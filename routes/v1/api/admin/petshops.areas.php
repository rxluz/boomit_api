<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| PETSHOPS AREAS ADMIN Routes
|--------------------------------------------------------------------------
|
*/

/* -------------------- petshop admin areas  routes --------------- */
Route::get('', 'Admin\PetshopController@indexAreas')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'tableLoaded:petshops_areas,petshop_id,param@petshop_id'
  );

Route::post('', 'Admin\PetshopController@storeArea')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1'
  );

Route::patch('{area_id}', 'Admin\PetshopController@updateArea')
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:area_id,petshops_areas,id,petshop_id,!petshop_id'
  );

Route::delete('{area_id}', $response["200"])
  ->middleware(
    'onlyAdmin:superOrPetowner',
    'exists:petshop_id,petshops,id,active,1',
    'exists:area_id,petshops_areas,id,petshop_id,!petshop_id',
    'delRow:area_id,petshops_areas,id'

  );
