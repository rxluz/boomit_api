<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\App\OthersRequest;
//use JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use \JD\Cloudder\Facades\Cloudder;
//use Hash;


/**
 * @resource /app/others
 *
 */

class OthersController extends Controller
{

  /**
   * [post] /contacts
   *
   * `Requires authentication: no`
   */
  public function storeContacts(OthersRequest $request){
    $contacts_data=new \App\Models\OtherContact([
      'name'=>$request->name,
      'email'=>$request->email,
      'message'=>$request->message
    ]);

    $contacts_data->save();

    return response('', 200);
  }

  public function storeShellQuiz(OthersRequest $request){
    $shell_quiz_data=new \App\Models\ShellQuiz([
        'e1_nome_completo' => $request->e1_nome_completo //ok
      , 'e1_email' => $request->e1_email //ok
      , 'e1_data_nascimento' => $request->e1_data_nascimento //ok
      , 'e1_seu_proposito' => $request->e1_seu_proposito //ok
      , 'e1_grau_escolaridade' => $request->e1_grau_escolaridade //ok
      , 'e1_hoje_esta' => $request->e1_hoje_esta //ok
      , 'e1_mora_com' => $request->e1_mora_com //ok
      , 'e1_sobre_renda' => $request->e1_sobre_renda //ok
      , 'e1_estagio_negocio' => $request->e1_estagio_negocio //ok
      , 'e1_tempo_dia' => $request->e1_tempo_dia //ok
      , 'e1_avalia_resultados' => $request->e1_avalia_resultados //ok
      , 'e1_apoio_familiar' => $request->e1_apoio_familiar //ok
      , 'e1_ideal_negocio' => $request->e1_ideal_negocio //ok
      , 'e1_fracassou_antes' => $request->e1_fracassou_antes //ok
      , 'e1_tempo_objetivo' => $request->e1_tempo_objetivo //ok
      , 'e1_proposito_detalhado' => $request->e1_proposito_detalhado //ok
      , 'e2_competencias' => $request->e2_competencias //ok
      , 'e2_fragilidades' => $request->e2_fragilidades //ok
      , 'e2_melhor_forca' => $request->e2_melhor_forca //ok
      , 'e2_pior_fragilidade' => $request->e2_pior_fragilidade //ok
      , 'e2_forca_parceiros' => $request->e2_forca_parceiros //ok
      , 'e2_corresponde_forca' => $request->e2_corresponde_forca //ok
      , 'e2_mantem_forca' => $request->e2_mantem_forca //ok
      , 'e2_forcas_final' => $request->e2_forcas_final //ok
      , 'e2_fragilidade_parceiros' => $request->e2_fragilidade_parceiros //ok
      , 'e2_corresponde_fragilidade' => $request->e2_corresponde_fragilidade //ok
      , 'e2_mantem_fragilidade' => $request->e2_mantem_fragilidade //ok
      , 'e2_fragilidades_final' => $request->e2_fragilidades_final //ok
      , 'e2_forca_fragilidade' => $request->e2_forca_fragilidade //ok
      , 'e2_justificativa_forca_fragilidade' => $request->e2_justificativa_forca_fragilidade //ok
      , 'e2_forca_1' => $request->e2_forca_1 //ok
      , 'e2_forca_2' => $request->e2_forca_2 //ok
      , 'e2_forca_3' => $request->e2_forca_3 //ok
      , 'e2_fragilidade_1' => $request->e2_fragilidade_1 //ok
      , 'e2_fragilidade_2' => $request->e2_fragilidade_2 //ok
      , 'e2_fragilidade_3' => $request->e2_fragilidade_3 //ok
      , 'e3_como_entrei' => $request->e3_como_entrei //ok
      , 'e3_como_saio' => $request->e3_como_saio //ok
      ]);

    $shell_quiz_data->save();
    return response(['id'=>$shell_quiz_data->id, 200);
  }

  public function updateShellQuiz(OthersRequest $request, $id){
    return response('ola mundo', 200);
  }


}
