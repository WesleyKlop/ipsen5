<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Firebase\JWT\JWT;
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

        $voter = Voter::create(["user_id" => $user->id, "code" => $code->code]);

        return JWT::encode([
            'iss' => env('APP_URL'),
            'aud' => env('APP_URL'),
            'iat' => Carbon::now()->timestamp,
            'exp' => Carbon::now()->addMonth()->timestamp,
            'sub' => $voter,
        ], env('APP_KEY'));
    }
}
