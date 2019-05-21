<?php

namespace App\Http\Controllers;

use App\Eloquent\User;
use App\Eloquent\Voter;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show(Request $request) {
        return $request->user()->getMatches();
        //return Voter::where('user_id',"150a899d-ac01-35ea-a49a-63d85bbe8e56")->first()->getMatches();
    }
}
