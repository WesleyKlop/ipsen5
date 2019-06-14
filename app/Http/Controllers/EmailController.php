<?php

namespace App\Http\Controllers;

use App\Mail\EmailResult;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function mail(Request $request)
    {
        $user = $request->user();
        $emailAddress = $request->json('email');
        $emailResult = new EmailResult($user);

        return Mail::to($emailAddress)->send($emailResult);
    }
}
