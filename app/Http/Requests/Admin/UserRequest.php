<?php

namespace App\Http\Requests\Admin;


use \App\Http\Requests\ValidateRequest;

class UserRequest extends ValidateRequest
{

    public function customRules()
    {
        $petshop_id= ValidateRequest::only('petshop_id');
        $petshop_id=$petshop_id["petshop_id"];

        // echo ;
        // exit;

        $auth=[
          'email' => 'min:2',
          'nickname' => 'min:3',
          'password' => 'min:5',
          'facebook_token' => 'min:5',
          'admin_mode' => 'boolean'
        ];

        $store=[
          'name'  => 'required|min:5',
          'email' => 'bail|required|email|unique:users',
          'password'  => 'bail|required|min:5',
          'facebook_token' => 'min:5|unique:users',
          'admin' => 'boolean',
          'petshop_id'  => $petshop_id!="null" ? 'exists:petshops,id' : ""
        ];

        $update=[
          'name'  => 'min:5',
          'email' => 'email|unique:users,email,'.$this->route('user_id'),
          'password'  => 'min:5',
          'facebook_token' => 'min:5|unique:users',
          'admin' => 'boolean',
          'petshop_id'  => $petshop_id!="null" ? 'exists:petshops,id' : ""
        ];

        return [
          "store" => $store,
          "update" => $update,
          "auth" => $auth
        ];
    }

}
