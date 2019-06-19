<?php

namespace App\Http\Controllers;

use App\Eloquent\Proposition;
use App\Eloquent\Setting;
use App\Eloquent\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SurveyController extends Controller
{
    public function toggleGeneralSurvey(Survey $survey)
    {
        $survey->use_general = !($survey->use_general);
        $survey->save();

        return view('admin.survey')->with('survey', $survey);
    }

    public function show(Request $request)
    {
        $survey = $request->user()->survey;

        //return dd($request->user()->survey);
        if ($survey->useGeneral()) {
            return ([
                'id' => $survey->id,
                'name' => $survey->name,
                'propositions' => Setting::europeanSurvey()->propositions->merge(Setting::countrySurvey()->propositions)->merge($survey->propositions)
            ]);
        } else {
            return $survey;
        }
    }

    public function showSurvey(Survey $survey)
    {
        return view('admin.survey')->with('survey', $survey);
    }

    /**
     * @param Survey $survey
     * @param Request $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function addProposition(Survey $survey, Request $request)
    {
        Validator::make($request->all(), [
            'proposition' => 'required|string|min:3|max:255',
        ])->validate();

        $survey->propositions()->create([
            'id' => Str::uuid(),
            'proposition' => $request->input('proposition'),
        ]);

        return redirect('admin/survey/'.$survey->id);
    }

    public function deleteProposition(Request $request)
    {
        $proposition = Proposition::find($request->input('proposition-id'));
        $survey = Survey::find($proposition->survey_id);
        $proposition->delete();

        return redirect('admin/survey/'.$survey->id);
    }
}
