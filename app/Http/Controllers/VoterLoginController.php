<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquent\SurveyCode;
use App\Eloquent\Voter;
use App\Eloquent\User;
use Ramsey\Uuid\Uuid;

class VoterLoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $code = SurveyCode::findOrFail($request->code);
        $user = User::create(["id" => Uuid::uuid4()]);

        // @NOTE (14-05-2019 DutchGhost):
        // This should be `"code" => $code->code`?
        $voter = Voter::create(["user_id" => $user->id, "code" => $code->code]);
        return $voter->user_id;
    }
}
