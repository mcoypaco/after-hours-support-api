<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->load('roles');
});

Route::resource('agent', 'AgentController');
Route::resource('campaign', 'CampaignController');
Route::resource('evaluation', 'EvaluationController');
Route::resource('questionnaire', 'QuestionnaireController');
Route::resource('team', 'TeamController');
Route::resource('work-queue', 'WorkQueueController');

Route::group(['prefix' => 'agent'], function () {
    Route::post('search', 'AgentController@search');
});