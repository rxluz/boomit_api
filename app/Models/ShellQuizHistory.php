<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class ShellQuizHistory extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'shell_quiz_history';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        'e1_nome_completo' //ok
      , 'e1_email' //ok
      , 'e1_data_nascimento' //ok
      , 'e1_seu_proposito' //ok
      , 'e1_grau_escolaridade' //ok
      , 'e1_hoje_esta' //ok
      , 'e1_mora_com' //ok
      , 'e1_sobre_renda' //ok
      , 'e1_estagio_negocio' //ok
      , 'e1_tempo_dia' //ok
      , 'e1_avalia_resultados' //ok
      , 'e1_apoio_familiar' //ok
      , 'e1_ideal_negocio' //ok
      , 'e1_fracassou_antes' //ok
      , 'e1_tempo_objetivo' //ok
      , 'e1_proposito_detalhado' //ok
      , 'e2_competencias' //ok
      , 'e2_fragilidades' //ok
      , 'e2_melhor_forca' //ok
      , 'e2_pior_fragilidade' //ok
      , 'e2_forca_parceiros' //ok
      , 'e2_corresponde_forca' //ok
      , 'e2_mantem_forca' //ok
      , 'e2_forcas_final' //ok
      , 'e2_fragilidade_parceiros' //ok
      , 'e2_corresponde_fragilidade' //ok
      , 'e2_mantem_fragilidade' //ok
      , 'e2_fragilidades_final' //ok
      , 'e2_forca_fragilidade' //ok
      , 'e2_justificativa_forca_fragilidade' //ok
      , 'e2_forca_1' //ok
      , 'e2_forca_2' //ok
      , 'e2_forca_3' //ok
      , 'e2_fragilidade_1' //ok
      , 'e2_fragilidade_2' //ok
      , 'e2_fragilidade_3' //ok
      , 'e3_como_entrei' //ok
      , 'e3_como_saio' //ok
  ];


  protected $hidden = [''];

  protected function getE1GrauEscolaridadeAttribute($value){
    return "oi ".$value;
  }


}
