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
}