<?php


Route::group(
    [
        'namespace'     =>  'AidynMakhataev\LaravelSurveyJs\app\Http\Controllers\API',
        'middleware'    =>  'api',
        'prefix'        =>  config('survey-manager.api_prefix')
    ],
    function () {
        Route::resource('/survey', 'SurveyAPIController');
    }
);