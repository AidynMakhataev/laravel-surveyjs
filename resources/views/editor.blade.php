<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('vendor/AidynMakhataev/LaravelSurveyJs/css/editor.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/survey-knockout/survey.css" />
    <title>Survey Manager</title>
</head>
<body>
    <a class="fork_me_on_github" href="https://github.com/surveyjs/surveyjs-php" target="_blank">
        <img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67"
             alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png">
    </a>
    <div class="survey-page-header">
        <div class="sv_main survey-page-header-content">
            <button onclick="window.location.replace('{{route('survey-manager.home')}}')">&lt&nbspBack</button>
        </div>
    </div>
    <div class="sv_main sv_frame sv_default_css" id="survey-manager">
        <div class="sv_custom_header">
        </div>
        <survey-editor :survey="{{ json_encode($survey) }}"></survey-editor>
    </div>

    <script src="{{asset('vendor/AidynMakhataev/LaravelSurveyJs/js/survey-manager.js')}}"></script>
</body>
</html>