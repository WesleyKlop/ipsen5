<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        /** @var Candidate|Voter $user */
        $user = $request->user();
        $data = Validator::make($request->json()->all(), [
            'value' => 'required|integer|min:0|max:100',
        ])->validate();

        return $user->feedback()->updateOrCreate([
            'user_id' => $user->user_id,
            'survey_id' => $user->survey->id,
        ], [
            'id' => Str::uuid(),
            'survey_id' => $user->survey->id,
            'user_id' => $user->user_id,
            'feedback' => $data['value'],
        ]);
    }
}
