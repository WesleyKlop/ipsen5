<?php

namespace App\Http\Controllers;

use App\Mail\VoterResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request) {
        $emailaddress = $request->mail;

        return Mail::to($emailaddress)->send(new VoterResult($request->user()));
    }
}
