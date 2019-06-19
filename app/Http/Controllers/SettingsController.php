<?php

namespace App\Http\Controllers;

use App\Eloquent\Admin;
use App\Eloquent\Setting;
use App\Eloquent\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function submit(Request $request)
    {
        $requestData = $request->validate([
            'trial-survey' => 'exists:surveys,id|required',
            'european-survey' => 'exists:surveys,id|required',
            'country-survey' => 'exists:surveys,id|required',
            'feedback-survey' => 'exists:surveys,id|required',
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

    public function updatePassword(Request $request)
    {
        /** @var Admin $user */
        $user = $request->user();
        $data = $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);
        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect(action('AdminLoginController@logout'));
    }
}
