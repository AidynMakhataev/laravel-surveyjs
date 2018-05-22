<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers\API;

use AidynMakhataev\LaravelSurveyJs\app\Http\Requests\CreateSurveyRequest;
use AidynMakhataev\LaravelSurveyJs\app\Http\Resources\SurveyResource;
use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use Illuminate\Routing\Controller;

class SurveyAPIController extends Controller
{
    public function index()
    {
        $surveys = Survey::paginate(config('survey-manager.pagination_perPage', 10));

        return SurveyResource::collection($surveys);
    }

    public function store(CreateSurveyRequest $request)
    {
        return $request->all();
    }
}
