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
    switch(strtolower($value)){
      case 'a':
        return 'Ensino médio completo';
      break;

      case 'b':
        return 'Superior incompleto';
      break;

      case 'c':
        return 'Superior completo';
      break;

      case 'd':
        return 'Pós-graduação incompleta';
      break;

      case 'e':
        return 'Pós-graduação completa';
      break;
    }
    return "NA";
  }

  // protected function getE1TempoDiaAttribute($value){
  //   switch(strtolower($value)){
  //     case 'a':
  //       return 'Algumas horas por semana';
  //     break;
  //
  //     case 'b':
  //       return 'Pelo menos duas horas por dia';
  //     break;
  //
  //     case 'c':
  //       return 'Cerca de oito horas por dia';
  //     break;
  //
  //     case 'd':
  //       return 'Todo o tempo disponível, inclusive finais de semana';
  //     break;
  //   }
  //   return "NA";
  // }

  protected function getE2CorrespondeForcaAttribute($value){
    switch(strtolower($value)){
      case '1':
        return 'Sim';
      break;

      case '0':
        return 'Não';
      break;
    }
    return "NA";
  }



  protected function getE1HojeEstaAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Desempregado';
      break;

      case 'b':
        return 'Com um emprego';
      break;

      case 'c':
        return 'Apenas com meu negócio, já funcionando';
      break;

      case 'd':
        return 'Com um emprego e com o meu negócio';
      break;
    }
    return "NA";
  }





  protected function getE1MoraComAttribute($value){
    $values=json_decode($value);


    foreach($values as $v){
      $newvalue=$newvalue ?? "";
      $newvalue=$newvalue.$this->moraCom($v).",";
    }

    $value=isset($newvalue) ? $newvalue."." : $value;

    return str_replace(",.", "", $value);
  }

  protected function getE2CompetenciasAttribute($value){
    $values=json_decode($value);


   foreach($values as $v){
      $newvalue=$newvalue ?? "";
      $newvalue=$newvalue.$this->competencias($v).",";
    }

    $value=isset($newvalue) ? $newvalue."." : $value;

    return str_replace(",.", "", $value);
  }

  protected function getE2FragilidadesAttribute($value){
    $values=json_decode($value);


    foreach($values as $v){
      $newvalue=$newvalue ?? "";
      $newvalue=$newvalue.$this->competencias($v).",";
    }

    $value=isset($newvalue) ? $newvalue."." : $value;

    return str_replace(",.", "", $value);
  }

  protected function getE2ForcasFinalAttribute($value){
    $values=json_decode($value);


    foreach($values as $v){
      $newvalue=$newvalue ?? "";
      $newvalue=$newvalue.$this->competencias($v).",";
    }

    $value=isset($newvalue) ? $newvalue."." : $value;

    return str_replace(",.", "", $value);
  }

  protected function getE2FragilidadesFinalAttribute($value){
    $values=json_decode($value);

    foreach($values as $v){
      $newvalue=$newvalue ?? "";
      $newvalue=$newvalue.$this->competencias($v).",";
    }

    $value=isset($newvalue) ? $newvalue."." : $value;

    return str_replace(",.", "", $value);
  }


  protected function getE2ForcaParceirosAttribute($value){
    return $this->competencias($value);
  }
  protected function getE2FragilidadeParceirosAttribute($value){
    return $this->competencias($value);
  }

  protected function getE2MelhorForcaAttribute($value){
    return $this->competencias($value);
  }


  protected function getE2PiorFragilidadeAttribute($value){
    return $this->competencias($value);
  }


  protected function competencias($value){
    switch(strtolower($value)){
      case 'a':
        return 'Modelo de Negócios';
      break;

      case 'b':
        return 'Pesquisa de Mercado';
      break;

      case 'c':
        return 'Planejamento Estratégico';
      break;

      case 'd':
        return 'Planejamento Financeiro';
      break;

      case 'e':
        return 'Marketing';
      break;

      case 'f':
        return 'Legislação';
      break;

      case 'g':
        return 'Gestão de Pessoas';
      break;

      case 'h':
        return 'Gestão Operacional';
      break;

      case 'i':
        return 'Resposabilidade Social';
      break;

    }
    return "NA";
  }

  protected function moraCom($value){
    switch(strtolower($value)){
      case 'a':
        return 'sozinho';
      break;

      case 'b':
        return 'mãe e/ou pai';
      break;

      case 'c':
        return 'companheiro(a)';
      break;

      case 'd':
        return 'filho(s)';
      break;

      case 'e':
        return 'amigo(s)';
      break;

      case 'f':
        return 'avó e/ou avô';
      break;

      case 'g':
        return 'outros parentes';
      break;
    }
    return "NA";
  }

  protected function getE1SobreRendaAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Não contribuo';
      break;

      case 'b':
        return 'Apenas pago minhas contas pessoais';
      break;

      case 'c':
        return 'Contribuo, mas pouco';
      break;

      case 'd':
        return 'Contribuo muito';
      break;

      case 'e':
        return 'Sustento a casa';
      break;
    }
    return "NA";
  }

  protected function getE1EstagioNegocioAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Ainda é uma ideia';
      break;

      case 'b':
        return 'Já comecei com ele, mas não está formalizado';
      break;

      case 'c':
        return 'Já comecei com ele, e está formalizado';
      break;

      case 'd':
        return 'Ele já existe há mais de um ano, mas não está formalizado';
      break;

      case 'e':
        return 'Ele já existe há mais de um ano, e está formalizado';
      break;
    }
    return "NA";
  }

  protected function getE1TempoDiaAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Algumas horas por semana';
      break;

      case 'b':
        return 'Pelo menos duas horas por dia';
      break;

      case 'c':
        return 'Cerca de oito horas por dia';
      break;

      case 'd':
        return 'Todo o tempo disponível, inclusive finais de semana';
      break;

    }
    return "NA";
  }

  protected function getE1AvaliaResultadosAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Estou tomando muito prejuízo, e pensando em desistir';
      break;

      case 'b':
        return 'Está devagar, sem lucro, e não sei como resolver a questão';
      break;

      case 'c':
        return 'Entra algum dinheiro, mas ainda longe do que espero';
      break;

      case 'd':
        return 'Estou satisfeito com os resultados atuais, e quero crescer';
      break;

    }
    return "NA";
  }


  protected function getE1ApoioFamiliarAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'A maioria é contra';
      break;

      case 'b':
        return 'Alguns acham a ideia boa, mas não dão suporte, seja emocional, seja efetivo';
      break;

      case 'c':
        return 'Tenho suporte emocional, muitos acreditam em mim';
      break;

      case 'd':
        return 'Recebo ajuda de membros da família para o meu negócio';
      break;

    }
    return "NA";
  }

  protected function getE1IdealNegocioAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Deve ser uma fonte alternativa de renda, complementar ao emprego';
      break;

      case 'b':
        return 'Deve ser o meu sustento, de modo que no fim do dia tenha tempo livre pra mim';
      break;

      case 'c':
        return 'Deve ser a realização de um sonho acima de tudo, mesmo que financeiramente só não dê prejuízo';
      break;

    }
    return "NA";
  }

  protected function getE1TempoObjetivoAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Não sei dizer';
      break;

      case 'b':
        return 'Em no máximo um ano';
      break;

      case 'c':
        return 'Entre dois e cinco anos';
      break;

    }
    return "NA";
  }

  protected function getE1FracassouAntesAttribute($value){
    switch(strtolower($value)){
      case 'a':
        return 'Não';
      break;

      case 'b':
        return 'Sim, já fracassei antes, mas outras pessoas causaram o revés na minha vida';
      break;

      case 'c':
        return 'Sim, já fracassei na vida pessoal, e fui responsável pelo que aconteceu';
      break;

      case 'd':
        return 'Sim, já fracassei com um negócio, e a culpa é minha';
      break;

      case 'e':
        return 'Várias vezes, tanto na vida pessoal quanto com um negócio';
      break;

    }
    return "NA";
  }

}
