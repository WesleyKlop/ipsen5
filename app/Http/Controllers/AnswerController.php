<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\Proposition;
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

    function show(Request $request)
    {
        /** @var Candidate $user */
        $user = $request->user();
        return $this->getPropositionWithAnswers($user);
    }

    function getPropositionWithAnswers(\App\Eloquent\Voter $user) {
        return $user->survey()->with([
            'propositions',
            'propositions.answers' => function (HasMany $q) use ($user) {
                $q
                    ->where('user_id', $user->user_id);
            }
        ])->get();
    }
}
