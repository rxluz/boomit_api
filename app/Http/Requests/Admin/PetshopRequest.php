<?php

namespace App\Http\Requests\Admin;


use \App\Http\Requests\ValidateRequest;

class PetshopRequest extends ValidateRequest
{

    public function customRules()
    {
      $store=[
        'cnpj'  => 'bail|required|unique:petshops,cnpj|cnpj',
        'ie'  => 'bail|required',
        'company_name'  => 'bail|required|unique:petshops,company_name',
        'trade_name'  => 'bail|required|unique:petshops,trade_name',
        'phone'  => 'bail|required',
        'email'  => 'bail|required|email|unique:petshops,email',
        'address'  => 'bail|required',
        'google_address'  => 'bail|required|google_address',
        'zip_code'  => 'bail|required',
        'picture' => 'bail|required|base64_image'
      ];

      $update=[
        'cnpj'  => 'cnpj|unique:petshops,cnpj,'.$this->route('petshop_id'),
        'ie'  => '',
        'company_name'  => 'unique:petshops,company_name,'.$this->route('petshop_id'),
        'trade_name'  => 'unique:petshops,trade_name,'.$this->route('petshop_id'),
        'phone'  => '',
        'email'  => 'email|unique:petshops,email,'.$this->route('petshop_id'),
        'address'  => '',
        'google_address'  => 'google_address',
        'zip_code'  => '',
        'picture' => 'base64_image'
      ];

      $ratingUpdate=[
        "petshop_comment" => "required"
      ];

      $storeOpeningHour=[
        "day" => "required|days_name",
        "hour_init" => 'required|date_format:H:i|hour_smaller_than:hour_end',
        "hour_end" => 'required|date_format:H:i|hour_greater_than:hour_init',
      ];


      $storeArea=[
        "type" => "required|google_type_names",
        "active" => 'required|boolean',
        "address" => 'required',
        "delivery_time" => 'required|numeric',
        "delivery_fee" => 'required|numeric',
      ];

      $updateArea=[
        "type" => "google_type_names",
        "active" => 'boolean',
        "address" => '',
        "delivery_time" => 'numeric',
        "delivery_fee" => 'numeric',
      ];


      return [
        "storeArea" => $storeArea,
        "updateArea" => $updateArea,
        "store" => $store,
        "update" => $update,
        "ratingUpdate" => $ratingUpdate,
        "storeOpeningHour" => $storeOpeningHour
      ];
    }

}
