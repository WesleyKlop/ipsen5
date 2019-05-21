<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show(Request $request) {
        return $request->user()->getMatches();
    }
}
