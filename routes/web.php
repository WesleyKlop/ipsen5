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
Route::get('/admin/register', 'AdminRegisterController@showRegistrationForm');
Route::post('/admin/register', 'AdminRegisterController@register');


Route::middleware('auth:web')->group(function () {
    Route::get('/admin/', function () {
        return view('admin.content');
    });

    Route::get('/admin/survey', 'SurveyOverviewController@showManageSurvey');
    Route::post('/admin/survey', 'SurveyOverviewController@createSurvey');

    Route::get('/admin/survey/{id}', 'SurveyController@showSurvey');
    Route::post('/admin/survey/{id}', 'SurveyController@addProposition');
});


// Fallback route for react routing
Route::view('/{path?}', 'app')->where('path', '^(?!admin).*$');
