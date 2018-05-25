<?php

return [
    'route_prefix'              =>  'survey',

    'api_prefix'                =>  'api',

    'user_model'                =>  'App\User',

    'route_middleware'          =>  ['web'],

    'api_middleware'            =>  ['api'],

    'pagination_perPage'        =>  10,

    'builder'                   =>  [

        'theme'                 =>  'default',

        'showEmbededSurveyTab'  =>  false,

        'showJSONEditorTab'     =>  false,

        'showTestSurveyTab'     =>  true,

        'showPropertyGrid'      =>  true,

        'showOptions'           =>  false,

        'showState'             =>  false,

        'haveCommercialLicense' =>  false
    ]
];