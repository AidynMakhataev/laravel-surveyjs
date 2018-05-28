@extends('survey-manager::master')

@section('stylesheets')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('vendor/AidynMakhataev/LaravelSurveyJs/css/index.css')}}">

@endsection

@section('content')
    <survey-result :survey="{{json_encode($survey)}}"></survey-result>
@endsection