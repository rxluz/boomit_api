<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Support\Facades\Blade;

use App\Models\ShellQuizHistory;


class ShellSuccess extends Mailable
{
    use Queueable, SerializesModels;

    protected $shell_quiz;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ShellQuizHistory $shell_quiz)
    {
        $this->shell_quiz=$shell_quiz;
        // //print_r($this->shell_quiz->e2_pior_fragilidade);
        // exit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('nao-responda@appock.co')
            ->subject('Teste')
            ->view('shell')
            ->with([
                'e1' => $this->get_e1()
              , 'e2' => $this->get_e2()
            ]);
        //return $this->view('view.name');
    }

    public function get_e2(){
      return [
          'e2_competencias' =>  [
                'name' => 'Escolha as três Competências em que você se sente mais capacitado. Elas serão as suas FORÇAS:'
              , 'value' => $this->shell_quiz->e2_competencias //ok
          ]

        , 'e2_fragilidades' =>  [
                'name' => 'Agora, escolha as três Competências em que você tem mais dificuldade. Elas serão as suas FRAGILIDADES:'
              , 'value' => $this->shell_quiz->e2_fragilidades //ok
          ]
        , 'e2_melhor_forca' =>  [
              'name' => 'Qual das suas três FORÇAS é a mais desenvolvida?'
            , 'value' => $this->shell_quiz->e2_melhor_forca //ok
          ]
        , 'e2_pior_fragilidade' =>  [
              'name' => 'Qual das suas três FRAGILIDADES é a menos desenvolvida?'
            , 'value' => $this->shell_quiz->e2_pior_fragilidade //ok
          ]
        , 'e2_forca_parceiros' =>  [
              'name' => 'Qual foi a sua maior FORÇA, segundo seus parceiros?'
            , 'value' => $this->shell_quiz->e2_forca_parceiros //ok
          ]
        , 'e2_corresponde_forca' =>  [
              'name' => 'Ela corresponde à sua escolha?'
            , 'value' => $this->shell_quiz->e2_corresponde_forca //ok
          ]
        , 'e2_mantem_forca' =>  [
              'name' => 'Você mantém sua escolha original, ou quer trocar?'
            , 'value' => $this->shell_quiz->e2_mantem_forca //ok
          ]
        , 'e2_forcas_final' => [
              'name' => 'Escolha de forças final:'
            , 'value' => $this->shell_quiz->e2_forcas_final //ok
          ]
        , 'e2_fragilidade_parceiros' =>  [
              "value" => $this->shell_quiz->e2_fragilidade_parceiros
            , "name" => "Qual foi a sua pior FRAGILIDADE, segundo seus parceiros?"
          ]
        , 'e2_corresponde_fragilidade' =>  [
            "value" => $this->shell_quiz->e2_corresponde_fragilidade,
            "name" => "Ela corresponde à sua escolha?"
          ]
        , 'e2_mantem_fragilidade' =>  [
              "name" => "Você mantém sua escolha original, ou quer trocar?"
            , "value" => $this->shell_quiz->e2_mantem_fragilidade //ok
          ]
        , 'e2_fragilidades_final' =>  [
              "name" => "Escolha de fragilidades final:"
            , "value" => $this->shell_quiz->e2_fragilidades_final //ok
          ]
        , 'e2_forca_fragilidade' =>  [
              "value" => $this->shell_quiz->e2_forca_fragilidade
            , "name" => "Durante o Desafio, você pôde trabalhar algumas das suas Competências. Você deu prioridade a usar suas FORÇAS ou a explorar suas FRAGILIDADES?"

          ]
        , 'e2_justificativa_forca_fragilidade' =>  [
              "value" => $this->shell_quiz->e2_justificativa_forca_fragilidade
            , "name" => "Justifique sua escolha apontada na pergunta anterior."
          ]
        , 'e2_forca_1' =>  [
              "value" => $this->shell_quiz->e2_forca_1
            , "name" => "Força 1:"
          ]
        , 'e2_forca_2' =>  [
              "value" => $this->shell_quiz->e2_forca_2
            , "name" => "Força 2:"
          ]
        , 'e2_forca_3' =>  [
              "value" => $this->shell_quiz->e2_forca_3
            , "name" => "Força 3:"
          ]
        , 'e2_fragilidade_1' =>  [
              "value" => $this->shell_quiz->e2_fragilidade_1
            , "name" => "Fragilidade 1:"
          ]
        , 'e2_fragilidade_2' =>  [
              "value" => $this->shell_quiz->e2_fragilidade_2
            , "name" => "Fragilidade 2:"
          ]
        , 'e2_fragilidade_3' =>  [
              "value" => $this->shell_quiz->e2_fragilidade_3
            , "name" => "Fragilidade 3:"
          ]
      ];
    }

    public function get_e1(){
      return [
          'e1_nome_completo' =>  [
                'name' => 'Nome completo:'
              , 'value' => $this->shell_quiz->e1_nome_completo //ok
          ]
        , 'e1_email' =>  [
              'name' => 'Email'
            , 'value' => $this->shell_quiz->e1_email //ok
          ]
        , 'e1_data_nascimento' =>  [
              'name' => 'Data de nascimento:'
            , 'value' => $this->shell_quiz->e1_data_nascimento //ok
          ]
        , 'e1_seu_proposito' =>  [
              'name' => 'Seu propósito:'
            , 'value' => $this->shell_quiz->e1_seu_proposito //ok
          ]
        , 'e1_grau_escolaridade' =>  [
              'name' => 'Grau de escolaridade:'
            , 'value' => $this->shell_quiz->e1_grau_escolaridade //ok
          ]
        , 'e1_hoje_esta' =>  [
              'name' => 'Hoje você está:'
            , 'value' => $this->shell_quiz->e1_hoje_esta //ok
          ]
        , 'e1_mora_com' => [
              'name' => 'Mora com:'
            , 'value' => $this->shell_quiz->e1_mora_com //ok
          ]
        , 'e1_sobre_renda' =>  [
              "value" => $this->shell_quiz->e1_sobre_renda
            , "name" => "Sobre a renda da sua residência:"
          ]
        , 'e1_estagio_negocio' =>  [
            "value" => $this->shell_quiz->e1_estagio_negocio,
            "name" => "Seu negócio está em que estágio?"
          ]
        , 'e1_tempo_dia' =>  [
              "name" => "Quanto tempo do seu dia se dedica ao seu negócio ou ideia de negócio?"
            , "value" => $this->shell_quiz->e1_tempo_dia //ok
          ]
        , 'e1_avalia_resultados' =>  [
              "name" => "Como você avalia os resultados financeiros do seu negócio?"
            , "value" => $this->shell_quiz->e1_avalia_resultados //ok
          ]
        , 'e1_apoio_familiar' =>  [
              "value" => $this->shell_quiz->e1_apoio_familiar
            , "name" => "Você tem apoio de familiares para desenvolver o seu negócio?"

          ]
        , 'e1_ideal_negocio' =>  [
              "value" => $this->shell_quiz->e1_ideal_negocio
            , "name" => "Em termos de ideal, o que descreve melhor o seu negócio para você?"
          ]
        , 'e1_fracassou_antes' =>  [
              "value" => $this->shell_quiz->e1_fracassou_antes
            , "name" => "Você já fracassou antes?"
          ]
        , 'e1_tempo_objetivo' =>  [
              "value" => $this->shell_quiz->e1_tempo_objetivo
            , "name" => "Daquilo que espera com o seu negócio, em quanto tempo acha que atingirá seu objetivo?"
          ]
        , 'e1_proposito_detalhado' =>  [
              "value" => $this->shell_quiz->e1_proposito_detalhado
            , "name" => "Reescreva seu Propósito mais detalhadamente, associando-o melhor ao seu negócio ou ideia de negocio:"
          ]
      ];
    }
}
