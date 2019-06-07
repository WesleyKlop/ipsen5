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
    function submit(Request $request)
    {
        $answers = collect($request->json()->all());

        return $request->user()->submitAnswers($answers);
    }

    /** @var Candidate $user */
    function show(Request $request)
    {
        $user = $request->user();
        return $this->getPropositionsWithAnswers($user);
    }

    function getPropositionsWithAnswers($user) {
        return $user->survey()->with([
            'propositions',
            'propositions.answers' => function (HasMany $q) use ($user) {
                $q
                    ->where('user_id', $user->user_id);
            }
        ])->get();
    }
}
