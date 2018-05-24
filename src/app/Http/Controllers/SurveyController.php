<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use Illuminate\Routing\Controller;

class SurveyController extends Controller
{

    public function editor($id)
    {
        $survey = Survey::findOrFail($id);

        return view('survey-manager::editor', [
            'survey' => $survey
        ]);
    }

    public function runSurvey($slug)
    {
        $survey = Survey::where('slug', $slug)->firstOrFail();

        return view('survey-manager::survey', [
            'survey'    =>  $survey
        ]);
    }
}