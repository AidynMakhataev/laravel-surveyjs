<?php

namespace AidynMakhataev\LaravelSurveyJs\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSurveyJs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelsurveyjs';
    }
}
