<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function submit(Request $request)
    {
        $answers = collect($request->json()->all());

        return $request->user()->submitAnswers($answers);
    }

    public function show(Request $request)
    {
        /** @var Candidate $user */
        $user = $request->user();
        return $user->getPropositionsWithAnswers();
    }
}
