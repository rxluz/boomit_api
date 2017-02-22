<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Route;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

define('USER_TEMP_ID', defined('USER_ID') ? USER_ID : 'user_id');

class ValidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
         return $this->verify($this->customRules());
     }

     public function rules(){
       if(!defined('USER_LOGGED')){
         define('USER_LOGGED', false);
       }

       if(!defined('USER_ADMIN')){
         define('USER_ADMIN', false);
       }

       if(!defined('ADMIN_MODE')){
         define('ADMIN_MODE', false);
       }


       if(!defined('USER_ID')){
         define('USER_ID', false);
       }

       if(!defined('USER_PETSHOP')){
         define('USER_PETSHOP', false);
       }

       if(!defined('USER_PETSHOP_ID')){
         define('USER_PETSHOP_ID', false);
       }

       $meth=explode("@", Route::getCurrentRoute(false)->getActionName());
       $meth=$meth[1];


       return $this->customRules()[$meth];
     }


    public function messages()
    {
        return [
            'required' => "required::attribute",
            'days_name' => "days_name::attribute",
            'google_type_names' => "google_type_names::attribute",
            'date_format' => "date_format::attribute",
            'hour_greater_than' => "",
            'hour_smaller_than' => "",
            'min' => 'min(:min)::attribute',
            'max' => 'max(:max)::attribute',
            'numeric' => 'numeric::attribute',
            'date' => 'date::attribute',
            'unique' => 'unique::attribute',
            'array' => 'array::attribute',
            'email' => 'emailType::attribute',
            'boolean' => 'boolean::attribute',
            'between' => 'between(:min-:max):attribute',
            'digits_between' => 'digits_between(:min-:max):attribute',
            'exists' => "no-exists::attribute",
            'required_with' => "required_with::attribute(:values)",
            'required_without' => "required_without::attribute(:values)",
            'json' => "json::attribute",
            'exists_in_array' => "exists_in_array::attribute",
            'array_between' => "",
            'allowed_if_super_admin' => "allowed_if_super_admin::attribute",
            'not_allowed_if' => "not_allowed::attribute",
            'required_if' => "required_if::attribute(:other::value)",
            'cnpj' => "cnpj::attribute",
            'unique_with' => "",
            'unique_w' => "",
            'array_different' => ""
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function verify($inputRules)
    {

      $meth=explode("@", Route::getCurrentRoute(false)->getActionName());
      $meth=$meth[1];

      $validator = Validator::make(FormRequest::all(), $inputRules[$meth], $this->messages());

      if ($validator->fails() && DOC_MODE==false) {
        header(true, true, 412);
        echo json_encode($validator->errors()->all());
        exit;
      }



      return true;
    }



}
