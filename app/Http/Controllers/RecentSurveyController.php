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
        $activeSurveys = $user
            ->surveyCodes()
            ->whereDate('expire', '>=', Carbon::now())
            ->with('survey')
            ->get();
        $expiredSurveys = $user
            ->surveyCodes()
            ->whereDate('expire', '<', Carbon::now())
            ->with('survey')
            ->get();

        return view('admin.recents', [
            'activeSurveys' => $activeSurveys,
            'expiredSurveys' => $expiredSurveys,
        ]);
    }
}
