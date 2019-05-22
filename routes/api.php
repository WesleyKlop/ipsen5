<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Login Routes. Entry points for candidates and voters
Route::get('/candidate/{candidateId}', 'LoginController@loginCandidate');
Route::post('/voter/login', 'LoginController@loginVoter');

Route::middleware('auth:api')->group(function () {
    Route::get('/me', 'LoginController@show');
    Route::get('/survey', 'SurveyController@show');
    Route::get('/survey/proposition', 'PropositionController@show');
    Route::post('/answer', 'AnswerController@submit');
    Route::get('/answer', 'AnswerController@show');

    Route::post('/profile', function (\Illuminate\Http\Request $request) {
        //TODO(WesleyKlop): Validation
        $request->file('profile_picture')->storeAs(
            'profiles', $request->user()->user_id
        );
        $request->user()->profile->update($request->only([
            'first_name',
            'last_name',
            'bio',
            'party',
            'function',
        ]));
        return $request->user;
    });
});
