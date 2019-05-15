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

// Login Route. Entry point for candidates
Route::get('/candidate/{candidateId}', 'CandidateController@login');


Route::middleware('auth:api')->group(function () {
    Route::get('/candidate', 'CandidateController@show');
});

Route::post('/user/login', 'VoterLoginController');
