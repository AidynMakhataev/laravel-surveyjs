<?php


Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers',
        'middleware'    =>  config('survey-manager.route_middleware'),
        'prefix'        =>  config('survey-manager.route_prefix')
    ],
    function () {
        Route::get('/{surveySlug}', 'SurveyController@runSurvey')->name('survey-manager.run');
    }
);

Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers',
        'prefix'        =>  config('survey-manager.admin_prefix'). '/survey/',
        'middleware'    =>  config('survey-manager.admin_middleware')
    ],
    function () {
        Route::view('/', 'survey-manager::index')->name('survey-manager.home');
        Route::get('/{survey}/result', 'SurveyController@result')->name('survey-manager.result');
        Route::get('/{survey}/editor', 'SurveyController@editor')->name('survey-manager.editor');
    }
);