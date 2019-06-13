<?php

namespace App\Http\Controllers;

use App\Eloquent\Proposition;
use App\Eloquent\Survey;
use App\Eloquent\Answer;
use App\Eloquent\Admin;
use App\Eloquent\SurveyCode;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SurveyController extends Controller
{
    public function show(Request $request)
    {
        return $request->user()->survey;
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
        Answer::where('proposition_id', '=', $proposition->id)->delete();
        $proposition->delete();

        return redirect('admin/survey/'.$survey->id);
    }

    public function addTeacher(Request $request)
    {
        $teacher = Admin::where('username', '=', $request->input('teacher'))->first();
        $surveyId = $request->input('survey-id');
        $surveyCode = mt_rand(100000, 999999);

        if ($teacher->type = 'teacher') {
            $teacher->removeFromTrial();

            SurveyCode::create([
                "code" => $surveyCode,
                "user_id" => $teacher->user_id,
                "survey_id" => $surveyId,
                "expire" => Carbon::now()->addMonth(),
            ]);
        }

        return redirect('admin/survey/'.$surveyId);
    }

    public function addCandidate(Request $request)
    {
        $candidateProfile = Profile::where('email', '=', $request->input('email'));

    }
}
