<?php
namespace App\Http\Requests\App;




use \App\Http\Requests\ValidateRequest;

class UserRequest extends ValidateRequest
{

    protected $auth=[
      'email' => [
        'min:2',
        'exists:users,email,active,1',
        'required_with:password'
      ],
      'password' => [
        'min:5',
        'required_with:email'
      ],
      'facebook_token' => [
        'min:5',
        'exists:users,facebook_token,active,1',
        'required_without:password,email'
      ]
    ];

    protected $store=[
      'name'  => 'required|min:5',
      'email' => 'bail|required|email|unique:users,email',
      'password'  => 'bail|required|min:5',
      'facebook_token' => 'min:5|unique:users,facebook_token'
    ];

    protected $update=[
      'name'  => 'min:5',
      'email' => 'email|unique:users,email,'.USER_TEMP_ID,
      'password'  => 'min:5',
      'facebook_token' => 'min:5|unique:users,facebook_token,'.USER_TEMP_ID
    ];

    protected $addressStore=[
      'name'  => [
        'required',
        'unique_w:table=users_address,field=name,value=request@name,and=user_id,and_value=const@USER_ID'
      ],

      'address'  => 'required',
      'number'  => 'required',
      'ajunct'  => 'required',
      'zip_code'  => 'required',
      'lat'  => 'required|numeric',
      'long'  => 'required|numeric',
      'city'  => 'required',
      'state'  => 'required|min:2|max:2'
    ];

    protected $addressUpdate=[
      'name'  => [
        'required',
        'unique_w:table=users_address,field=name,value=request@name,and=user_id,and_value=const@USER_ID,except=param@address_id'
      ],
      'address'  => 'required',
      'number'  => 'required',
      'ajunct'  => 'required',
      'zip_code'  => 'required',
      'lat'  => 'required|numeric',
      'long'  => 'required|numeric',
      'city'  => 'required',
      'state'  => 'required|min:2|max:2'
    ];

    protected $petsStore=[
      'type'  => [
        'required',
        'unique_w:table=users_pets,field=name,value=request@name,and=user_id,and_value=const@USER_ID'
      ],
      'name'  => 'required|min:2',
      'picture'  => 'required'
    ];


    protected $petsUpdate=[
      'type'  => 'required|max:1',
      'name'  => [
        'required',
        'unique_w:table=users_pets,field=name,value=request@name,and=user_id,and_value=const@USER_ID,except=param@pets_id'
      ],
      'picture'  => 'required'
    ];


    public function customRules()
    {
        return [
          "store" => $this->store,
          "update" => $this->update,
          "auth" => $this->auth,
          "addressUpdate" => $this->addressUpdate,
          "addressStore" => $this->addressStore,
          "petsStore" => $this->petsStore,
          "petsUpdate" => $this->petsUpdate
        ];
    }

}
