<?php

namespace App\Http\Controllers;

use App\Eloquent\User;
use App\Eloquent\Voter;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show(Request $request) {
        //return $request->user()->getMatches();
       return Voter::where('user_id', "5f585f7c-083c-3cd9-b7ba-95151b022370")->first()->getMatches();
       // return Voter::where('user_id', "f2fe9d70-dfad-3c44-94e7-0a8dbf286680")->first()->getMatches();

       // return Voter::where('user_id', "84213f43-700c-3050-9702-77065ccf35df")->first()->getMatches();
    }
}
