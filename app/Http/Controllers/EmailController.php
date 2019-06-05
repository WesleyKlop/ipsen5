<?php

namespace App\Http\Controllers;

use App\Mail\VoterResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request) {
        $email_addr = $request->mail;

        return Mail::to($email_addr)->send(new VoterResult($request->user()));
    }
}
