<?php

namespace App\Http\Controllers;


use App\Eloquent\Survey;

class ManageSurveyController extends Controller
{

    public function showManageSurvey()
    {
        $surveys = Survey::get();
        return view('manage-survey')->with('surveys', $surveys);
    }

    public function showSurvey($id)
    {
        $survey = Survey::find($id);
        return view('survey')->with('survey', $survey);
    }
}
