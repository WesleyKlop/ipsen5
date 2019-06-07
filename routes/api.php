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
    Route::post('/profile', 'ProfileController@submit');
    Route::get('/voter/results', 'ResultController@show');
    Route::post('/voter/email', 'EmailController@mail');
});
