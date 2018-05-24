@extends('survey-manager::master')

@section('stylesheets')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('vendor/AidynMakhataev/LaravelSurveyJs/css/editor.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/survey-knockout/survey.css"/>
@endsection

@section('content')
    <div class="sv_main sv_frame sv_default_css">
        <show-survey :survey-data="{{json_encode($survey)}}"></show-survey>
    </div>

@endsection