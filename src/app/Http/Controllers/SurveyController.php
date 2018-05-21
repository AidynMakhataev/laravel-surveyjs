<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers;

use Illuminate\Routing\Controller;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey-manager::index');
    }

    public function editor($id)
    {
        return view('survey-manager::editor');
    }
}