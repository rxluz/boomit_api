<?php
namespace App\Http\Requests\App;




use \App\Http\Requests\ValidateRequest;

class OthersRequest extends ValidateRequest
{

    protected $storeContacts=[
      'email' => [
        'required',
        'email'
      ],
      'name' => [
        'required'
      ],
      'message' => [
        'required'
      ]
    ];


    public function customRules()
    {
        return [
          "storeContacts" => $this->storeContacts
        ];
    }

}
