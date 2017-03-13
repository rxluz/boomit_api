<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


$response["200"]=function(){
  return response("", 200);
};

/*
|--------------------------------------------------------------------------
| PETSHOPS OPENIN HOURS ADMIN Routes
|--------------------------------------------------------------------------
|
*/



/* -------------------- petshop admin openinghours  routes --------------- */
  Route::get('', 'Admin\PetshopController@indexOpeningHours')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'tableLoaded:petshops_openinghours,petshop_id,param@petshop_id'
    );


  Route::post('', 'Admin\PetshopController@storeOpeningHour')
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1'
    );


  Route::delete('{openinghours_id}', $response["200"])
    ->middleware(
      'onlyAdmin:superOrPetowner',
      'exists:petshop_id,petshops,id,active,1',
      'exists:openinghours_id,petshops_openinghours,id',
      'delRow:openinghours_id,petshops_openinghours,id'
    );
