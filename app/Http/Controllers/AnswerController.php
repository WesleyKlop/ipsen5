<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class AnswerController extends Controller
{
    function submit(Request $request) {
        $answers = collect($request->json()->all());

        return $request->user()->submitAnswers($answers);
    }
}
