<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // The prefix used in all base routes
    'route_prefix'              =>  'survey',

    // The prefix used in api endpoints
    'api_prefix'                =>  'api',

    // The prefix used in admin route
    'admin_prefix'              =>  'admin',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    */

    // route middleware
    'route_middleware'          =>  ['web'],

    // api middleware
    'api_middleware'            =>  ['api'],

    // admin middleware
    'admin_middleware'          =>  ['web'],

    /*
    |--------------------------------------------------------------------------
    | Other config
    |--------------------------------------------------------------------------
    */

    // Pagination in admin section
    'pagination_perPage'        =>  12,

    // User model
    'user_model'                =>  'App\User',

    // Default locale for survey
    'locale'                    =>  'en',

    // Default theme for survey
    'theme'                     =>  'darkblue',

    /*
    |--------------------------------------------------------------------------
    | SurveyJS Builder Configuration
    | More: https://surveyjs.io/Documentation/Builder/?id=surveyeditor
    |--------------------------------------------------------------------------
    */

    'builder'                   =>  [

        'theme'                 =>  'darkblue',

        'showEmbededSurveyTab'  =>  false,

        'showJSONEditorTab'     =>  false,

        'showTestSurveyTab'     =>  true,

        'showPropertyGrid'      =>  true,

        'showOptions'           =>  false,

        'showState'             =>  false,

        'haveCommercialLicense' =>  false,
    ],

    /*
    |--------------------------------------------------------------------------
    | SurveyJS Custom Widgets
    |--------------------------------------------------------------------------
    */
    'widgets'                   =>  [

        'icheck'                =>  false,

        'select2'               =>  false,

        'inputmask'             =>  false,

        'jquerybarrating'       =>  false,

        'jqueryuidatepicker'    =>  false,

        'nouislider'            =>  false,

        'select2tagbox'         =>  false,

        'signaturepad'          =>  false,

        'sortablejs'            =>  false,

        'ckeditor'              =>  false,

        'autocomplete'          =>  false,

        'bootstrapslider'       =>  false,
    ],
];
