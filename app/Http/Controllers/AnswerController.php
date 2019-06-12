<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\Proposition;
use App\Eloquent\Voter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function submit(Request $request)
    {
        $answers = collect($request->json()->all());

        return $request->user()->submitAnswers($answers);
    }

    /** @var Candidate $user */
    public function show(Request $request)
    {
        $user = $request->user();
        return $user->getPropositionsWithAnswers();
    }
}
