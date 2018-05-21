<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers\API;

use AidynMakhataev\LaravelSurveyJs\app\Http\Requests\CreateSurveyRequest;
use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use Illuminate\Routing\Controller;

class SurveyAPIController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();

        return $surveys;
    }

    public function store(CreateSurveyRequest $request)
    {
        return $request->all();
    }
}
