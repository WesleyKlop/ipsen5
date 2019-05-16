<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use App\Eloquent\SurveyCode;
use App\Eloquent\User;
use App\Eloquent\Voter;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class LoginController extends Controller
{

    public function loginCandidate(?string $candidateId)
    {
        $candidate = Candidate::where('url', $candidateId)->firstOrFail();
        return $this->generateAuthJwt(User::TYPE_CANDIDATE, $candidate->user_id);
    }

    public function loginVoter(Request $request)
    {
        $code = SurveyCode::findOrFail($request->code);
        $user = User::create(["id" => Uuid::uuid4()]);

        $voter = Voter::create(["user_id" => $user->id, "code" => $code->code]);

        return $this->generateAuthJwt(User::TYPE_VOTER, $voter->user_id);
    }

    private function generateAuthJwt(string $type, string $userId): string
    {
        return JWT::encode([
            'iss' => env('APP_URL'),
            'aud' => env('APP_URL'),
            'iat' => Carbon::now()->timestamp,
            'exp' => Carbon::now()->addMonth()->timestamp,
            'sub' => [
                'type' => $type,
                'uid' => $userId,
            ],
        ], env('APP_KEY'));
    }

    public function show(Request $request)
    {
        return $request->user();
    }
}
