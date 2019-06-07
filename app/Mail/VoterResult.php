<?php

namespace App\Mail;

use App\Http\Controllers\AnswerController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Eloquent\Voter;

class VoterResult extends Mailable
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
                $controller = new AnswerController();
                $this->answers = $controller->getPropositionsWithAnswers($user)[0]['propositions'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('stemapp@outlook.com')->view('emails.voterresult');
    }
}
