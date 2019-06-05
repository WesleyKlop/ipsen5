<?php

namespace App\Http\Controllers;


use App\Eloquent\Survey;

class ManageSurveyController extends Controller{

    public function showManageSurvey() {
        $surveys = Survey::get();
        return view('manage-survey') -> with('surveys', $surveys);
    }

    public function showSurvey($id) {
        $survey = Survey::find($id);
        return view('survey') ->with('survey', $survey);
    }

    public function createSurvey(Request $request) {

//        $newSurveyName = $request->input('newSurveyName');

//        $validated = $request->validate([
//            'newSurveyName'    => 'required|string|unique:posts|min:5|max:100',
//        ]);


//        $post = Post::create($newSurveyName);
    }
}
