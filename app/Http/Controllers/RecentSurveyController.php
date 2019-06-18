<?php

namespace App\Http\Controllers;

use App\Eloquent\Admin;
use App\Eloquent\Survey;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RecentSurveyController extends Controller
{
    public function startSurvey(Request $request, Survey $survey)
    {
        /** @var Admin $user */
        $user = $request->user();
        $startDate = CarbonImmutable::now();

        $user->surveyCodes()->create([
            'code' => mt_rand(100000, 999999),
            'survey_id' => $survey->id,
            'started_at' => $startDate,
            'expire' => $startDate->add('2 weeks'),
        ]);

        return redirect('/admin/');
    }

    public function show(Request $request)
    {
        /** @var Admin $user */
        $user = $request->user();
        $startableSurveys = $user
            ->surveys;

        $activeSurveys = $user
            ->surveyCodes()
            ->where('expire', '>=', Carbon::now())
            ->whereNotNull('started_at')
            ->with('survey')
            ->get();
        $expiredSurveys = $user
            ->surveyCodes()
            ->where('expire', '<', Carbon::now())
            ->whereNotNull('started_at')
            ->with('survey')
            ->get();

        return view('admin.recents', [
            'startableSurveys' => $startableSurveys,
            'activeSurveys' => $activeSurveys,
            'expiredSurveys' => $expiredSurveys,
        ]);
    }
}
