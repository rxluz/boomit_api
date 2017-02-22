<?php

namespace App\Http\Requests\Admin;


use \App\Http\Requests\ValidateRequest;
use Illuminate\Support\Facades\DB;

class CategoryRequest extends ValidateRequest
{

    public function customRules()
    {

      $store=[
        'animal_type'  =>
            'required_if:type,0|
            array|
            array_between:0,5|
            array_different|
            not_allowed_if:type,1',

        'type'  =>
            'required|
            boolean',

        'name'  =>
            'required|
            min:2|
            unique_with:none,table@petshops_categories,tablefield@name,request@type,param@petshop_id'
            .(
              USER_PETSHOP == TRUE
              ? ",".USER_PETSHOP_ID
              : ''
            ),

        'parent_category_id' =>
            'required_if:type,1|
            not_allowed_if:type,0|
            exists:petshops_categories,id,active,1',

        'petshop_id' =>
            'allowed_if_super_admin:'.USER_PETSHOP_ID.'|
            exists:petshops,id,active,1',
      ];

      $update=[
        'animal_type'  =>
            'required_if:type,0|
            array|
            array_between:0,5|
            array_different|
            not_allowed_if:type,1',

        'type'  =>
            'required|
            boolean',

        'name'  =>
            'required|
            min:2|
            unique_with:update@category_id,table@petshops_categories,tablefield@name,request@type,param@petshop_id'
            .(
              USER_PETSHOP == TRUE
              ? ",".USER_PETSHOP_ID
              : ''
            ),

        'parent_category_id' =>
            'required_if:type,1|
            not_allowed_if:type,0|
            exists:petshops_categories,id,active,1',

        'petshop_id' =>
            'allowed_if_super_admin:'.USER_PETSHOP_ID.'|
            exists:petshops,id,active,1',
      ];


      return [
        "store" => $store,
        "update" => $update
      ];
    }

}
