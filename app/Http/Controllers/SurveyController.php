<?php

namespace App\Http\Controllers;

use App\Eloquent\Proposition;
use App\Eloquent\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->survey;
    }

    public function showSurvey($id)
    {
        $survey = Survey::find($id);
        return view('survey') ->with('survey', $survey);
    }

    public function addProposition(Request $request) {

        $validated = $request->validate ([
            'proposition' => 'required|string|min:3|max:255',
        ]);

        if($validated) {
            $proposition = new Proposition();
            $proposition->proposition = $request->input('proposition_name');
            $proposition->id = Str::uuid();
            $proposition->survey_id = $request->segment(3);
            $proposition->save();
        }
        return redirect($request->url());
    }
}
