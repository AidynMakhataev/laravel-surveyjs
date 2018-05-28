<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title or 'Survey Manager'}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/vuetify/dist/vuetify.min.css">
    @yield('stylesheets')
    @yield('scripts')
</head>
<body>
    <div id="survey-manager">
        <v-app>
            <v-toolbar color="primary" dark fixed app>
                <v-toolbar-title>Survey Manager</v-toolbar-title>
            </v-toolbar>
            <v-content>
                <v-container fluid fill-height>
                    <v-layout justify-center align-center>
                        <v-flex text-xs-center>
                            @yield('content')
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
            <v-footer color="primary" app>
                <v-spacer></v-spacer>
                <span class="white--text">AidynMakhataev &copy; 2018</span>
            </v-footer>
        </v-app>
    </div>

    <script>
        window.SurveyConfig = {!! json_encode(config('survey-manager')) !!};
    </script>
    <script src="{{asset('vendor/AidynMakhataev/LaravelSurveyJs/js/survey-manager.js')}}"></script>

    @yield('after_scripts')


</body>
</html>