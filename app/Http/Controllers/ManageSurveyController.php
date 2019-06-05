<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eloquent\Survey;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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

//        $validated = $request->validate([
//            'newSurveyName' => 'required|string|unique:posts|min:5|max:100'
//        ]);

        if(true) {
            $survey = new Survey();
            $survey->name = $request->input('newSurveyName');
            $survey->id = Str::uuid($survey->name);
            $survey->save();
            return Redirect::to(url()->current().'/'.$survey->id) ->with('survey', $survey);
        }
    }

}
