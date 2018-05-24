<?php


Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers',
        'middleware'    =>  config('survey-manager.route_middleware'),
        'prefix'        =>  config('survey-manager.route_prefix')
    ],
    function () {
        Route::view('/', 'survey-manager::index')->name('survey-manager.home');
        Route::get('/{surveySlug}', 'SurveyController@runSurvey')->name('survey-manager.run');
        Route::get('/editor/{id}', 'SurveyController@editor')->name('survey-manager.editor');
    }
);