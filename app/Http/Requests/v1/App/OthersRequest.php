<?php
namespace App\Http\Requests\App;


use \App\Http\Requests\ValidateRequest;

class OthersRequest extends ValidateRequest
{

    protected $storeContacts=[
      'email' => [
        'required'
      ],
      'name' => [
        'required'
      ],
      'message' => [
        'required'
      ]
    ];

<<<<<<< HEAD:app/Http/Requests/App/OthersRequest.php
    protected $storeShellQuiz=[
      'e1_nome_completo' => [
        'required'
=======
    protected $storeShell=[
        'e1_nome_completo' => [
          'required'
>>>>>>> 01c25a83ea1e685e5b7b867d31f12911c8a34b88:app/Http/Requests/v1/App/OthersRequest.php
      ]
      , 'e1_email' => [
          'required'
        , 'email'
      ]
      , 'e1_data_nascimento' => [
<<<<<<< HEAD:app/Http/Requests/App/OthersRequest.php
        'required'
      ]
      , 'e1_seu_proposito' => [
        'max:400'
      ]
      , 'e1_grau_escolaridade' => []
      , 'e1_hoje_esta' => []
    ];


    protected $updateShellQuiz=[
      'e1_nome_completo' => [
        'required'
      ]
      , 'e1_email' => [
          'required'
        , 'email'
      ]
      , 'e1_data_nascimento' => [
        'required'
      ]
      , 'e1_seu_proposito' => [
        'max:400'
      ]
      , 'e1_grau_escolaridade' => []
      , 'e1_hoje_esta' => []
    ];
=======
          'required'
      ]
      , 'e1_seu_proposito' => [
         'max:400'
      ]
      , 'e1_grau_escolaridade' => [
         ''
      ]
      , 'e1_hoje_esta' => [
         ''
      ]
    ];

>>>>>>> 01c25a83ea1e685e5b7b867d31f12911c8a34b88:app/Http/Requests/v1/App/OthersRequest.php

    public function customRules()
    {
        return [
            "storeContacts" => $this->storeContacts
          , "updateShellQuiz" => $this->updateShellQuiz
          , "storeShellQuiz" => $this->storeShellQuiz
        ];
    }

}
