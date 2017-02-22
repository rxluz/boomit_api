<?php
namespace App\Http\Requests\App;




use \App\Http\Requests\ValidateRequest;

class PetshopsRequest extends ValidateRequest
{

    protected $storeRatings=[
      'user_comment' => 'required|min:10',
      'rating' => 'required|numeric|min:1|max:5'
    ];


    public function customRules()
    {
        return [
          "storeRatings" => $this->storeRatings
        ];
    }

}
