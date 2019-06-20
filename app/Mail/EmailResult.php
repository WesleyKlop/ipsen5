<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailResult extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $answers;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->answers = $user->getPropositionsWithAnswers()[0]['propositions'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Resultaten van de Stem!App')
            ->from('stemapp@outlook.com')
            ->view('emails.emailResult');
    }
}
