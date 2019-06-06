<?php

namespace App\Http\Controllers;

use App\Eloquent\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SurveyOverviewController extends Controller
{

    public function showManageSurvey()
    {
        $surveys = Survey::all();
        return view('admin.manage-survey')->with('surveys', $surveys);
    }


    public function createSurvey(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:surveys|min:5|max:255',
        ]);

        if ($validated) {
            $survey = Survey::create([
                'id' => Str::uuid(),
                'name' => $request->input('name'),
            ]);
            return Redirect::to(url()->current() . '/' . $survey->id)->with('survey', $survey);
        } else {
            print('validation failed');
        }
    }
}
