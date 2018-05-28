<?php

namespace AidynMakhataev\LaravelSurveyJs\app\Http\Controllers;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use Illuminate\Routing\Controller;

class SurveyController extends Controller
{

    /**
     * @param Survey $survey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editor(Survey $survey)
    {
        return view('survey-manager::editor', [
            'survey' => $survey
        ]);
    }

    /**
     * @param Survey $survey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Survey $survey)
    {
        return view('survey-manager::result', [
            'survey'    =>  $survey
        ]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function runSurvey($slug)
    {
        $survey = Survey::where('slug', $slug)->firstOrFail();

        return view('survey-manager::survey', [
            'survey'    =>  $survey
        ]);
    }
}