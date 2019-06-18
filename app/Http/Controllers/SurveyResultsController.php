<?php

namespace App\Http\Controllers;

use App\Eloquent\SurveyCode;

class SurveyResultsController extends Controller
{
    public function show(SurveyCode $code)
    {
        return view('admin.results', [
            'code' => $code,
            'survey' => $code->survey,
        ]);
    }
}
