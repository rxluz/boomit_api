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
        'e1_nome_completo' => ['required'] //ok
      , 'e1_email' => ['required', 'email'] //ok
      , 'e1_data_nascimento' => ['required'] //ok
      , 'e1_seu_proposito' => ['max:450'] //ok
      , 'e1_grau_escolaridade' => [] //ok
      , 'e1_hoje_esta' => [] //ok
      , 'e1_mora_com' => [] //ok
      , 'e1_sobre_renda' => [] //ok
      , 'e1_estagio_negocio' => [] //ok
      , 'e1_tempo_dia' => []  //ok
      , 'e1_avalia_resultados' => [] //ok
      , 'e1_apoio_familiar' => [] //ok
      , 'e1_ideal_negocio' => [] //ok
      , 'e1_fracassou_antes' => [] //ok
      , 'e1_tempo_objetivo' => [] //ok
      , 'e1_proposito_detalhado' => ['max:1550'] //ok
      , 'e2_competencias' => [] //ok
      , 'e2_fragilidades' => [] //ok
      , 'e2_melhor_forca' => [] //ok
      , 'e2_pior_fragilidade' => [] //ok
      , 'e2_forca_parceiros' => []  //ok
      , 'e2_corresponde_forca' => [] //ok
      , 'e2_mantem_forca' => [] //?
      , 'e2_forcas_final' => [] //ok
      , 'e2_fragilidade_parceiros' => [] //ok
      , 'e2_corresponde_fragilidade' => [] //ok
      , 'e2_mantem_fragilidade' => [] //ok
      , 'e2_fragilidades_final' => []
      , 'e2_forca_fragilidade' => [] //ok
      , 'e2_justificativa_forca_fragilidade' => ['max:950'] //ok
      , 'e2_forca_1' => ['max:450'] //ok
      , 'e2_forca_2' => ['max:450'] //ok
      , 'e2_forca_3' => ['max:450'] //ok
      , 'e2_fragilidade_1' => ['max:450'] //ok
      , 'e2_fragilidade_2' => ['max:450'] //ok
      , 'e2_fragilidade_3' => ['max:450'] //ok1
      , 'e3_como_entrei' => ['max:1250'] //ok
      , 'e3_como_saio' => ['max:1250'] //ok
    ];


    protected $updateShellQuiz=[
        'e1_nome_completo' => [] //ok
      , 'e1_email' => ['email'] //ok
      , 'e1_data_nascimento' => [] //ok
      , 'e1_seu_proposito' => ['max:450'] //ok
      , 'e1_grau_escolaridade' => [] //ok
      , 'e1_hoje_esta' => [] //ok
      , 'e1_mora_com' => [] //ok
      , 'e1_sobre_renda' => [] //ok
      , 'e1_estagio_negocio' => [] //ok
      , 'e1_tempo_dia' => []  //ok
      , 'e1_avalia_resultados' => [] //ok
      , 'e1_apoio_familiar' => [] //ok
      , 'e1_ideal_negocio' => [] //ok
      , 'e1_fracassou_antes' => [] //ok
      , 'e1_tempo_objetivo' => [] //ok
      , 'e1_proposito_detalhado' => ['max:1550'] //ok
      , 'e2_competencias' => [] //ok
      , 'e2_fragilidades' => [] //ok
      , 'e2_melhor_forca' => [] //ok
      , 'e2_pior_fragilidade' => [] //ok

      , 'e2_forca_parceiros' => []  //ok
      , 'e2_corresponde_forca' => [] //ok
      , 'e2_mantem_forca' => [] //?
      , 'e2_forcas_final' => [] //ok

      , 'e2_fragilidade_parceiros' => [] //
      , 'e2_corresponde_fragilidade' => []
      , 'e2_mantem_fragilidade' => []
      , 'e2_fragilidades_final' => []


      , 'e2_forca_fragilidade' => [] //ok
      , 'e2_justificativa_forca_fragilidade' => ['max:950'] //ok
      , 'e2_forca_1' => ['max:450'] //ok
      , 'e2_forca_2' => ['max:450'] //ok
      , 'e2_forca_3' => ['max:450'] //ok
      , 'e2_fragilidade_1' => ['max:450'] //ok
      , 'e2_fragilidade_2' => ['max:450'] //ok
      , 'e2_fragilidade_3' => ['max:450'] //ok

      , 'e3_como_entrei' => ['max:1250'] //ok
      , 'e3_como_saio' => ['max:1250'] //ok
    ];

    public function customRules()
    {
        return [
            "storeContacts" => $this->storeContacts
          , "updateShellQuiz" => $this->updateShellQuiz
          , "storeShellQuiz" => $this->storeShellQuiz
          , "storeShellQuizHistory1" => $this->storeShellQuiz
        ];
    }

}
