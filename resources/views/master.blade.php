<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Manager</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    @yield('stylesheets')
    @yield('scripts')
</head>
<body>
    <div id="survey-manager">
        @yield('content')
    </div>

    <script>
        window.SurveyConfig = {!! json_encode([
                'apiPrefix'    =>  config('survey-manager.api_prefix'),
                'routePrefix'  =>  config('survey-manager.route_prefix')
        ]) !!};
    </script>
    <script src="{{asset('vendor/AidynMakhataev/LaravelSurveyJs/js/survey-manager.js')}}"></script>
    @yield('after_scripts')


</body>
</html>