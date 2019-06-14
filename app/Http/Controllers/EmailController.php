<?php

namespace App\Http\Controllers;

use App\Mail\EmailResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function mail(Request $request)
    {
        $user = $request->user();
        $emailaddress = $request->mail;
        $emailResult = new EmailResult($user);

        return Mail::to($emailaddress)->send($emailResult);
    }
}
