<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers\API;

use AidynMakhataev\LaravelSurveyJs\app\Http\Requests\CreateSurveyRequest;
use AidynMakhataev\LaravelSurveyJs\app\Http\Requests\UpdateSurveyRequest;
use AidynMakhataev\LaravelSurveyJs\app\Http\Resources\SurveyResource;
use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use Illuminate\Routing\Controller;

class SurveyAPIController extends Controller
{
    public function index()
    {
        $surveys = Survey::latest()->paginate(config('survey-manager.pagination_perPage', 10));

        return SurveyResource::collection($surveys);
    }

    public function store(CreateSurveyRequest $request)
    {
        $survey = Survey::create($request->all());

        return response()->json([
            'data'      =>  new SurveyResource($survey),
            'message'   =>  'Survey saved successfully'
        ], 201);
    }

    public function update($id, UpdateSurveyRequest $request)
    {
        $survey = Survey::find($id);

        if(is_null($survey)) {
            return response()->json('Survey not found', 404);
        }

        $survey->update($request->all());

        return response()->json([
            'data'      =>  new SurveyResource($survey),
            'message'   =>  'Survey successfully updated'
        ]);
    }

    public function destroy($id)
    {
        $survey = Survey::find($id);

        if(is_null($survey)) {
            return response()->json('Survey not found', 404);
        }
        $survey->delete();

        return response()->json([
            'data' => $id,
            'message' => 'Survey deleted successfully'
        ], 200);
    }
}
