<?php

namespace App\Http\Controllers;

use App\Eloquent\Proposition;
use Illuminate\Http\Request;
use App\Eloquent\Survey;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SurveyOverviewController extends Controller{

    public function showManageSurvey()
    {
        $surveys = Survey::get();
        return view('manage-survey') -> with('surveys', $surveys);
    }


    public function createSurvey(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|unique:surveys|min:5|max:255',
        ]);

        if($validated) {
            $survey = new Survey();
            $survey->name = $request->input('name');
            $survey->id = Str::uuid();
            $survey->save();
            return Redirect::to(url()->current().'/'.$survey->id) ->with('survey', $survey);
        } else {
            print('validation failed');
        }
    }

}
