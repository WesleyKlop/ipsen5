<?php

namespace App\Http\Controllers;

use App\Eloquent\Candidate;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function login(?string $candidateId)
    {
        $candidate = Candidate::where('url', $candidateId)->firstOrFail();
        return JWT::encode([
            'iss' => env('APP_URL'),
            'aud' => env('APP_URL'),
            'iat' => Carbon::now()->timestamp,
            'exp' => Carbon::now()->addMonth()->timestamp,
            'sub' => $candidate,
        ], env('APP_KEY'));
    }

    public function show(Request $request)
    {
        return $request->user();
    }
}
