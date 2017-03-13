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
            ]);
        //return $this->view('view.name');
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
