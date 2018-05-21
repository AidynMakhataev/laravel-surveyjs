<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use Illuminate\Routing\Controller;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();

        return view('survey-manager::index', [
            'surveys' => $surveys
        ]);
    }

    public function editor($id)
    {
        return view('survey-manager::editor');
    }
}