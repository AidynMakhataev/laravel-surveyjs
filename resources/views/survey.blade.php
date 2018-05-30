<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey | {{$survey->name}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://surveyjs.azureedge.net/1.0.24/survey.jquery.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link href="https://surveyjs.azureedge.net/1.0.24/survey.css" type="text/css" rel="stylesheet"/>
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
                    <div class="panel-body" id="surveyElement"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        Survey.StylesManager.applyTheme('default');

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        var json = {!! json_encode($survey->json) !!};

        window.survey = new Survey.Model(json);

        survey.onComplete
            .add(function (result) {

                $.ajax({

                    type:'POST',

                    url:'/{{config('survey-manager.api_prefix')}}/survey/{{$survey->id}}/result',

                    data:{json: result.data},

                    success:function(data){

                        console.log(data);

                    }

                });
            });

        $("#surveyElement").Survey({model: survey});
    </script>
</body>
</html>