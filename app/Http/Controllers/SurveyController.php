<?php

namespace App\Http\Controllers;

use App\Eloquent\Admin;
use App\Eloquent\Answer;
use App\Eloquent\Candidate;
use App\Eloquent\Profile;
use App\Eloquent\Proposition;
use App\Eloquent\Setting;
use App\Eloquent\Survey;
use App\Eloquent\Teacher;
use App\Eloquent\User;
use App\Mail\EmailCandidateRequest;
use Mail;
use Carbon\Carbon;
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
        $survey->use_general = ! ($survey->use_general);
        $survey->save();

        return view('admin.survey')->with('survey', $survey);
    }

    public function show(Request $request)
    {
        $survey = $request->user()->survey;

        if ($survey->useGeneral()) {
            return ([
                'id' => $survey->id,
                'name' => $survey->name,
                'propositions' => Setting::europeanSurvey()->propositions
                    ->merge(Setting::countrySurvey()->propositions)
                    ->merge($survey->propositions)
                    ->merge(Setting::feedbackSurvey()->propositions),
            ]);
        } else {
            return $survey;
        }
    }

    public function showSurvey(Survey $survey)
    {
        return view('admin.survey')->with('survey', $survey);
    }

    public function search(Request $request)
    {
        $q = $request->query('q');
        /** @var Admin $user */
        $user = $request->user();
        $query = $user->isTeacher()
            ? $user->surveys()
            : Survey::query();
        return $query
            ->where('name', 'ILIKE', '%' . $q . '%')
            ->limit(5)
            ->get();
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

        return redirect('admin/survey/' . $survey->id);
    }

    public function deleteProposition(Request $request)
    {
        $proposition = Proposition::find($request->input('proposition-id'));
        $survey = Survey::find($proposition->survey_id);
        Answer::where('proposition_id', '=', $proposition->id)->delete();
        $proposition->delete();

        return redirect('admin/survey/' . $survey->id);
    }

    public function addTeacher(Request $request, Survey $survey)
    {
        /** @var Admin $teacher */
        $teacher = Admin
            ::where('username', '=', $request->input('teacher'))
            ->firstOrFail();

        if ($teacher->isTeacher()) {
            if ($teacher->isInTrial()) {
                $teacher->removeFromTrial();
            }

            Teacher::create([
                "user_id" => $teacher->user_id,
                "survey_id" => $survey->id,
            ]);
        }

        return redirect(action('SurveyController@showSurvey', $survey));
    }

    public function removeTeacher(Request $request, Survey $survey)
    {
        $userId = $request->input('userId');
        Teacher
            ::where([
                'survey_id' => $survey->id,
                'user_id' => $userId,
            ])
            ->delete();

        return redirect(action('SurveyController@showSurvey', $survey));
    }

    public function addCandidate(
        Request $request,
        ProfileController $profileController
    ) {
        $surveyId = $request->input('survey-id');
        $email = $request->input('email');
        $profile = Profile::where('email', '=', $email)->first();

        if (is_null($profile)) {
            //Profile does not exist, create user and profile.
            $user = User::create([
                'id' => Str::uuid(),
            ]);
            $profile = $profileController->createNewProfile($user->id, $email);
        }
        $user_id = $profile->user_id;

        if (Candidate::where('survey_id', '=', $surveyId)
            ->where('user_id', '=', $user_id)
            ->exists()) {
            //candidate is already added to survey.
            return redirect('admin/survey/' . $surveyId);
        }

        Candidate::create([
            'url' => Str::uuid(),
            'survey_id' => $surveyId,
            'user_id' => $user_id,
        ]);
        return redirect('admin/survey/' . $surveyId);
    }

    public function removeCandidate(Request $request)
    {
        $surveyId = $request->input('surveyId');
        $url = $request->input('url');

        Candidate::where('url', '=', $url)->delete();

        return redirect('admin/survey/' . $surveyId);
    }
    public function mailCandidate(Request $request)
    {
        $url = $request->input('url');
        $candidate = Candidate::where('url', '=', $url)->first();
        $emailAddress = $candidate->profile->email;
        $surveyId = $candidate->survey_id;

        $emailCandidateRequest = new EmailCandidateRequest($candidate);

        Mail::to($emailAddress)->send($emailCandidateRequest);

        return redirect('admin/survey/' . $surveyId);
    }
}
