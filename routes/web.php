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
Route::get('/admin/login', 'AdminLoginController@showLoginForm');
Route::post('/admin/login', 'AdminLoginController@login');

Route::get('/admin/manage-survey', 'ManageSurveyController@showManageSurvey');
Route::get('/admin/manage-survey/{id}', 'ManageSurveyController@showSurvey');

// Fallback route for react routing
Route::view('/{path?}', 'app')->where('path', '.*');
