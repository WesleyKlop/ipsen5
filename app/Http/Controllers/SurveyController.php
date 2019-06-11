<?php

namespace App\Http\Controllers;

use App\Eloquent\Survey;
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

    public function search(Request $request)
    {
        $q = $request->query('q');
        return Survey
            ::where('name', 'ILIKE', '%' . $q . '%')
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

        return view('admin.survey')->with(['survey' => $survey]);
    }
}
