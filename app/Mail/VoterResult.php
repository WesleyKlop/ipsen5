<?php

namespace App\Mail;

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
    public function __construct(Voter $voter)
    {
            $this->voter = $voter;


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
