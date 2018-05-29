<?php

return [
    'route_prefix'              =>  'survey',

    'api_prefix'                =>  'api',

    'admin_prefix'              =>  'admin',

    'user_model'                =>  'App\User',

    'route_middleware'          =>  ['web'],

    'api_middleware'            =>  ['api'],

    'admin_middleware'          =>  ['web'],

    'pagination_perPage'        =>  12,

    'builder'                   =>  [

        'theme'                 =>  'darkblue',

        'showEmbededSurveyTab'  =>  false,

        'showJSONEditorTab'     =>  false,

        'showTestSurveyTab'     =>  true,

        'showPropertyGrid'      =>  true,

        'showOptions'           =>  false,

        'showState'             =>  false,

        'haveCommercialLicense' =>  false
    ]
];