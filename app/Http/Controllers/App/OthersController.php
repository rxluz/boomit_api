<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\App\OthersRequest;
use App\Models\ShellQuiz;
use App\Models\ShellQuizHistory;
use App\Models\ShellQuizHistory2;

use App\Mail\ShellSuccess;
use Illuminate\Support\Facades\Mail;

/**
 * @resource /app/others
 *
 */

class OthersController extends Controller
{

  protected $shell_quiz;

  public function __construct(ShellQuiz $shell_quiz, ShellQuizHistory $shell_quiz_history){
    $this->shell_quiz=$shell_quiz;
    $this->shell_quiz_history=$shell_quiz_history;
  }

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
    $this->storeShellQuizHistory($request);
    return response($shell_quiz_data, 200);
  }


  public function storeShellQuizHistory1(OthersRequest $request){
    //echo MAILGUN_SECRET;
    // /exit;

    $this->storeShellQuizHistory2($request);
  }


  public function storeShellQuizHistory2($request){
    $shell_quiz_history_data=new \App\Models\ShellQuizHistory([
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

    $shell_quiz_history_data->save();


    //if()
    Mail::to("ricardo.out@gmail.com")
        ->bcc("ricardo.appock@gmail.com")
        ->queue(new ShellSuccess($shell_quiz_history_data));

    return true;
  }


  public function storeShellQuizHistory($request){
    $shell_quiz_history_data=new \App\Models\ShellQuizHistory([
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

    $shell_quiz_history_data->save();

    if(isset($request->e3_como_saio) && trim($request->e3_como_saio)!=""){
      Mail::to($shell_quiz_history_data->e1_email)
          ->bcc("ricardo.out@gmail.com")
          ->queue(new ShellSuccess($shell_quiz_history_data));

    }


    return true;
  }

  public function updateShellQuiz(OthersRequest $request, $id){
    $shell_quiz=$this->shell_quiz->where('id', $id)->first();

    $shell_quiz->e1_nome_completo=$request->e1_nome_completo ?? $shell_quiz->e1_nome_completo; //ok
    $shell_quiz->e1_email=$request->e1_email ?? $shell_quiz->e1_email; //ok
    $shell_quiz->e1_data_nascimento=$request->e1_data_nascimento ?? $shell_quiz->e1_data_nascimento; //ok
    $shell_quiz->e1_seu_proposito=$request->e1_seu_proposito ?? $shell_quiz->e1_seu_proposito; //ok
    $shell_quiz->e1_grau_escolaridade=$request->e1_grau_escolaridade ?? $shell_quiz->e1_grau_escolaridade; //ok
    $shell_quiz->e1_hoje_esta=$request->e1_hoje_esta ?? $shell_quiz->e1_hoje_esta; //ok
    $shell_quiz->e1_mora_com=$request->e1_mora_com ?? $shell_quiz->e1_mora_com; //ok
    $shell_quiz->e1_sobre_renda=$request->e1_sobre_renda ?? $shell_quiz->e1_sobre_renda; //ok
    $shell_quiz->e1_estagio_negocio=$request->e1_estagio_negocio ?? $shell_quiz->e1_estagio_negocio; //ok
    $shell_quiz->e1_tempo_dia=$request->e1_tempo_dia ?? $shell_quiz->e1_tempo_dia; //ok
    $shell_quiz->e1_avalia_resultados=$request->e1_avalia_resultados ?? $shell_quiz->e1_avalia_resultados; //ok
    $shell_quiz->e1_apoio_familiar=$request->e1_apoio_familiar ?? $shell_quiz->e1_apoio_familiar; //ok
    $shell_quiz->e1_ideal_negocio=$request->e1_ideal_negocio ?? $shell_quiz->e1_ideal_negocio; //ok
    $shell_quiz->e1_fracassou_antes=$request->e1_fracassou_antes ?? $shell_quiz->e1_fracassou_antes; //ok
    $shell_quiz->e1_tempo_objetivo=$request->e1_tempo_objetivo ?? $shell_quiz->e1_tempo_objetivo; //ok
    $shell_quiz->e1_proposito_detalhado=$request->e1_proposito_detalhado ?? $shell_quiz->e1_proposito_detalhado; //ok
    $shell_quiz->e2_competencias=$request->e2_competencias ?? $shell_quiz->e2_competencias; //ok
    $shell_quiz->e2_fragilidades=$request->e2_fragilidades ?? $shell_quiz->e2_fragilidades; //ok
    $shell_quiz->e2_melhor_forca=$request->e2_melhor_forca ?? $shell_quiz->e2_melhor_forca; //ok
    $shell_quiz->e2_pior_fragilidade=$request->e2_pior_fragilidade ?? $shell_quiz->e2_pior_fragilidade; //ok
    $shell_quiz->e2_forca_parceiros=$request->e2_forca_parceiros ?? $shell_quiz->e2_forca_parceiros; //ok
    $shell_quiz->e2_corresponde_forca=$request->e2_corresponde_forca ?? $shell_quiz->e2_corresponde_forca; //ok
    $shell_quiz->e2_mantem_forca=$request->e2_mantem_forca ?? $shell_quiz->e2_mantem_forca; //ok
    $shell_quiz->e2_forcas_final=$request->e2_forcas_final ?? $shell_quiz->e2_forcas_final; //ok
    $shell_quiz->e2_fragilidade_parceiros=$request->e2_fragilidade_parceiros ?? $shell_quiz->e2_fragilidade_parceiros; //ok
    $shell_quiz->e2_corresponde_fragilidade=$request->e2_corresponde_fragilidade ?? $shell_quiz->e2_corresponde_fragilidade; //ok
    $shell_quiz->e2_mantem_fragilidade=$request->e2_mantem_fragilidade ?? $shell_quiz->e2_mantem_fragilidade; //ok
    $shell_quiz->e2_fragilidades_final=$request->e2_fragilidades_final ?? $shell_quiz->e2_fragilidades_final; //ok
    $shell_quiz->e2_forca_fragilidade=$request->e2_forca_fragilidade ?? $shell_quiz->e2_forca_fragilidade; //ok
    $shell_quiz->e2_justificativa_forca_fragilidade=$request->e2_justificativa_forca_fragilidade ?? $shell_quiz->e2_justificativa_forca_fragilidade; //ok
    $shell_quiz->e2_forca_1=$request->e2_forca_1 ?? $shell_quiz->e2_forca_1; //ok
    $shell_quiz->e2_forca_2=$request->e2_forca_2 ?? $shell_quiz->e2_forca_2; //ok
    $shell_quiz->e2_forca_3=$request->e2_forca_3 ?? $shell_quiz->e2_forca_3; //ok
    $shell_quiz->e2_fragilidade_1=$request->e2_fragilidade_1 ?? $shell_quiz->e2_fragilidade_1; //ok
    $shell_quiz->e2_fragilidade_2=$request->e2_fragilidade_2 ?? $shell_quiz->e2_fragilidade_2; //ok
    $shell_quiz->e2_fragilidade_3=$request->e2_fragilidade_3 ?? $shell_quiz->e2_fragilidade_3; //ok
    $shell_quiz->e3_como_entrei=$request->e3_como_entrei ?? $shell_quiz->e3_como_entrei; //ok
    $shell_quiz->e3_como_saio=$request->e3_como_saio ?? $shell_quiz->e3_como_saio; //ok

    $this->storeShellQuizHistory($request);



    $shell_quiz->save();

    return response($shell_quiz, 200);
  }

  public function reportShellQuizV2(){
    //return response('olar mundo', 200);
    return $this->reportShellQuiz(true);
  }


  private function getApproved(){
    $quiz = ShellQuizHistory2::select('id', 'e1_nome_completo', 'e1_email', 'e2_mantem_forca')->where('approved', '1')->get();

    $data=[];

    foreach ($quiz as $answer) {
        $answer->e1_email=strtolower($answer->e1_email);
        $data[strtolower($answer->e1_email)]["id"]=$answer->id;
        $data[strtolower($answer->e1_email)]["e1_nome_completo"]=$answer->e1_nome_completo;
        $data[strtolower($answer->e1_email)]["e1_email"]=$answer->e1_email;
        $data[strtolower($answer->e1_email)]["e2_mantem_forca"]=$answer->e2_mantem_forca;
        $data[strtolower($answer->e1_email)]["included"]=false;
    }

    return $data;
  }



  private function getPeopleGroup($name, $total){
    $list=[];
    $totalInside=1;

    //search for different skills
    $skills=[];

    foreach($this->dataGroup as $d){
      $d["group"]=$name;
      if($d["included"]==false && $totalInside<=$total){
        $inc=true;
        foreach($skills as $skill){
            if($skill == $d["e2_mantem_forca"]){
              $inc=false;
            }
        }

        if($inc){
          $skills[]=$d["e2_mantem_forca"];
          $list[]=$d;
          $this->dataGroup[$d["e1_email"]]["included"]=true;
          $totalInside++;
        }
      }
    }

    if($totalInside<=$total){
      foreach($this->dataGroup as $d){
        $d["group"]=$name;
        if($d["included"]==false && $totalInside<=$total){
          $list[]=$d;
          $this->dataGroup[$d["e1_email"]]["included"]=true;
          $totalInside++;
        }
      }
    }
    echo json_decode($list);
    return $list;
  }


  protected $dataGroup=[];



  private function aasort (&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
     foreach ($arr as $key=> $row) {
         $sort_col[$key] = $row[$col];
     }

     return array_multisort($sort_col, $dir, $arr);
  }

  public function reportShellQuizV3(){

    $this->dataGroup=$this->getApproved();
    $endData=[];
    $x=1;

    $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

    while($x<11){
      $endData[$x]["name"] = "Grupo ".$x;
      $endData[$x]["pessoas"] = $this->getPeopleGroup($endData[$x]["name"], 8);

      //$data=$this->setPeopleAsIncluded($data, $endData[$x]["pessoas"]);
      $tempData=$endData[$x]["pessoas"];
      //print_r($tempData);
      //exit;

      foreach($tempData as $tem){
        $csv->insertOne($tem);
      }



      $x++;
    }


    //return response($endData, 200);
    $csv->output('relatorio_shell_grupos'.date('Ymdhis').'.csv');
  }


  public function reportShellQuiz($alldata=false){
    //$people=$this->shell_quiz_history->where('e3_como_saio', "!=", "")->get();

    if(!$alldata){
      $quiz = ShellQuizHistory2::where('e3_como_saio', '!=', '')->get();
    }else{
      $quiz = ShellQuizHistory2::get();
    }


    $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

    $csv->insertOne(\Schema::getColumnListing('shell_quiz_history'));


    $data=[];
    foreach ($quiz as $answer) {
        $answer->e1_email=strtolower($answer->e1_email);
        $answer->e2_forca_1=$answer->e2_forca_1;
        $answer->e2_forca_2=$answer->e2_forca_2;
        $answer->e2_forca_3=$answer->e2_forca_3;
        $answer->e2_fragilidade_1=$answer->e2_fragilidade_1;
        $answer->e2_fragilidade_2=$answer->e2_fragilidade_2;
        $answer->e2_fragilidade_3=$answer->e2_fragilidade_3;

        $data[strtolower($answer->e1_email)]=$answer;


    }

    foreach($data as $item){
      $csv->insertOne($item->toArray());
    }

    $csv->output('relatorio_shell'.date('Ymdhis').'.csv');
  }


}
