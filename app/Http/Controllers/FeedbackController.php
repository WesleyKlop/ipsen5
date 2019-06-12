<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function submit(Request $request)
    {
        /** @var Candidate|Voter $user */
        $user = $request->user();
        $data = Validator::make($request->json()->all(), [
            'value' => 'required|integer|min:0|max:100',
        ])->validate();
        return $data;
    }
}
