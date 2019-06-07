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

    public $voter;
    public $answers;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($voter)
    {
            $controller = new AnswerController();
            $this->voter = $voter;
            $this->answers = $controller->getPropositionWithAnswers($voter)[0]['propositions'];
            //$this->answers = $this->voter->answersWithQuestions();
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
