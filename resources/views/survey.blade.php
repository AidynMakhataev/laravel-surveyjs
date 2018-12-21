<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey | {{$survey->name}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/survey-manager/css/survey.css') }}" />
    <style>
        .mt-25 {
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 mt-25">
                <div class="panel panel-default center-block">
                    <div class="panel-heading">{{$survey->name}}</div>
                    <div class="panel-body" id="surveyElement">
                        <survey-show :survey-data="{{ json_encode($survey) }}"></survey-show>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.SurveyConfig = {!! json_encode(config('survey-manager')) !!};
    </script>

    <script src="{{ asset('vendor/survey-manager/js/survey-front.js') }}"></script>
</body>
</html>