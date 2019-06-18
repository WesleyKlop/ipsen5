<?php

namespace App\Http\Controllers;

use App\Eloquent\Setting;
use App\Eloquent\Survey;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function submit(Request $request)
    {
        $requestData = $request->validate([
            'trial-survey' => 'exists:surveys,id|required',
            'european-survey' => 'exists:surveys,id|required',
            'country-survey' => 'exists:surveys,id|required',
        ]);

        foreach ($requestData as $name => $id) {
            Setting::where('name', $name)
                ->update(['value' => $id]);
        }

        return redirect()->intended(action('SettingsController@show'));
    }

    public function show()
    {
        $surveys = Survey::all();

        return view('admin.settings', [
            'surveys' => $surveys,
        ]);
    }
}
