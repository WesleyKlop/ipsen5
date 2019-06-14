<?php

namespace App\Http\Controllers;

use App\Eloquent\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RecentSurveyController extends Controller
{
    public function show(Request $request)
    {
        /** @var Admin $user */
        $user = $request->user();
        $startableSurveys = $user
            ->surveyCodes()
            ->whereNull('started_at')
            ->with('survey')
            ->get();
        $activeSurveys = $user
            ->surveyCodes()
            ->whereDate('expire', '>=', Carbon::now())
            ->whereNotNull('started_at')
            ->with('survey')
            ->get();
        $expiredSurveys = $user
            ->surveyCodes()
            ->whereDate('expire', '<', Carbon::now())
            ->with('survey')
            ->get();

        return view('admin.recents', [
            'startableSurveys' => $startableSurveys,
            'activeSurveys' => $activeSurveys,
            'expiredSurveys' => $expiredSurveys,
        ]);
    }
}
