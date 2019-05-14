<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquent\SurveyCode;

class VoterLoginController extends Controller
{
    public function __invoke(Request $request)
    {
        return SurveyCode::findOrFail($request->code);
    }
}
