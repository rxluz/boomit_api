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
            ->view('shell');
        //return $this->view('view.name');
    }
}
