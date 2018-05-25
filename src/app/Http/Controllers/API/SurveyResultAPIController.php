<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers\API;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use AidynMakhataev\LaravelSurveyJs\app\Http\Resources\SurveyResultResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SurveyResultAPIController extends Controller {

    public function index(Survey $survey) {

        return SurveyResultResource::collection($survey->results);
    }

    /**
     * @param Survey $survey
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Survey $survey, Request $request)
    {
        $request->validate([
            'json'  =>  'required'
        ]);

        $result = $survey->results()->create([
            'json'          =>  $request->input('json'),
            'user_id'       =>  \Auth::check() ? \Auth::id() : null,
            'ip_address'    =>  $request->ip()
        ]);

        return response()->json([
            'data'      =>  new SurveyResultResource($result),
            'message'   =>  'Survey Result successfully created'
        ], 201);
    }

}