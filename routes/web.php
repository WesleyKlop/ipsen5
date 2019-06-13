<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin routes
Route::get('/admin/login', 'AdminLoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'AdminLoginController@login');
Route::get('/admin/logout', 'AdminLoginController@logout');
Route::get('/admin/register', 'AdminRegisterController@showRegistrationForm');
Route::post('/admin/register', 'AdminRegisterController@register');

Route::middleware('auth:web')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.content');
    });

    Route::get('survey', 'SurveyOverviewController@showManageSurvey');
    Route::post('survey', 'SurveyOverviewController@createSurvey');
    Route::delete('survey', 'SurveyOverviewController@deleteSurvey');

    Route::post('survey/candidate', 'SurveyOverviewController@linkCandidateToSurvey');

    Route::post('survey/teacher', 'SurveyController@addTeacher');
    Route::get('survey/teacher', 'SurveyController@addTeacher');


    Route::get('survey/{survey}', 'SurveyController@showSurvey');
    Route::post('survey/{survey}', 'SurveyController@addProposition');
    Route::delete('survey/{survey}', 'SurveyController@deleteProposition');


    Route::get('settings', 'SettingsController@show');
    Route::post('settings', 'SettingsController@submit');
});

// Fallback route for react routing
Route::view('/{path?}', 'app')->where('path', '^(?!admin).*$');
