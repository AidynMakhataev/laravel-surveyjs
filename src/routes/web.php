<?php


Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers',
        'middleware'    =>  'web',
        'prefix'        =>  config('survey-manager.route_prefix')
    ],
    function () {
        Route::get('/', 'SurveyController@index')->name('survey-manager.home');
        Route::get('/editor/{id}', 'SurveyController@editor');
    }
);