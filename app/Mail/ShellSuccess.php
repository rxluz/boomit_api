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
          'e1_nome_completo' =>  $this->shell_quiz->e1_nome_completo //ok
        , 'e1_email' =>  $this->shell_quiz->e1_email //ok
        , 'e1_data_nascimento' =>  $this->shell_quiz->e1_data_nascimento //ok
        , 'e1_seu_proposito' =>  $this->shell_quiz->e1_seu_proposito //ok
        , 'e1_grau_escolaridade' =>  $this->shell_quiz->e1_grau_escolaridade //ok
        , 'e1_hoje_esta' =>  $this->shell_quiz->e1_hoje_esta //ok
        , 'e1_mora_com' =>  $this->shell_quiz->e1_mora_com //ok
        , 'e1_sobre_renda' =>  $this->shell_quiz->e1_sobre_renda //ok
        , 'e1_estagio_negocio' =>  $this->shell_quiz->e1_estagio_negocio //ok
        , 'e1_tempo_dia' =>  $this->shell_quiz->e1_tempo_dia //ok
        , 'e1_avalia_resultados' =>  $this->shell_quiz->e1_avalia_resultados //ok
        , 'e1_apoio_familiar' =>  $this->shell_quiz->e1_apoio_familiar //ok
        , 'e1_ideal_negocio' =>  $this->shell_quiz->e1_ideal_negocio //ok
        , 'e1_fracassou_antes' =>  $this->shell_quiz->e1_fracassou_antes //ok
        , 'e1_tempo_objetivo' =>  $this->shell_quiz->e1_tempo_objetivo //ok
        , 'e1_proposito_detalhado' =>  $this->shell_quiz->e1_proposito_detalhado //ok
      ]
    }
}
