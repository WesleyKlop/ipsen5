<?php

namespace App\Http\Controllers;

use App\Eloquent\User;
use App\Eloquent\Voter;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->getMatches();
    }
}
