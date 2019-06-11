<?php

namespace App\Http\Controllers;

use App\Eloquent\Proposition;
use App\Eloquent\Survey;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SurveyOverviewController extends Controller
{
    public function showManageSurvey()
    {
        $surveys = Survey::all();
        return view('admin.manage-survey')->with('surveys', $surveys);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function createSurvey(Request $request)
    {
        Validator::make($request->only('name'), [
            'name' => 'required|string|unique:surveys|min:5|max:255',
        ])->validate();

        $survey = Survey::create([
            'id' => Str::uuid(),
            'name' => $request->input('name'),
        ]);
        return Redirect::action('SurveyController@showSurvey', ['survey' => $survey->id]);
    }

    public function deleteSurvey(Request $request)
    {
        $survey = Survey::find($request->input('survey-id'));
        Proposition::all()->where('survey_id','=', $survey->id)->each->delete();
        Survey::destroy($survey->id);

        return $this->showManageSurvey();
    }
}
