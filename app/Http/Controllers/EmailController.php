<?php

namespace App\Http\Controllers;

use App\Mail\VoterResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function mail(Request $request) {
        $user = $request->user();

        $emailaddress = $request->mail;

        return Mail::to($emailaddress)->send(new VoterResult($request->user()));
    }
}
