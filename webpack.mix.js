let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Custom Mix setup
 |--------------------------------------------------------------------------
 |
 */

mix
    .setPublicPath('public')
    .js('resources/assets/js/survey-manager.js', 'public/js/');