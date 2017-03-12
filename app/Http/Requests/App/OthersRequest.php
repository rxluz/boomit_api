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

    protected $storeShellQuiz=[
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

    public function customRules()
    {
        return [
            "storeContacts" => $this->storeContacts
          , "updateShellQuiz" => $this->updateShellQuiz
          , "storeShellQuiz" => $this->storeShellQuiz
        ];
    }

}
