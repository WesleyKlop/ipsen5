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
        return view('admin.survey')->with('survey', $survey);
    }

    public function addProposition(Request $request)
    {

        $validated = $request->validate([
            'proposition' => 'required|string|min:3|max:255',
        ]);

        if ($validated) {
            Proposition::create([
                'id' => Str::uuid(),
                'proposition' => $request->input('proposition_name'),
                'survey_id' => $request->segment(3),
            ]);
        }
        return redirect($request->url());
    }
}
