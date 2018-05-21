/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./base");

window.Vue = require("vue");

/**
 * Moment is a javascript library that we can use to format dates
 * It's similar to Carbon in PHP so we mostly use it to format
 * dates that are returned from our Laravel Eloquent models
 */
window.moment = require("moment");

/**
 * Register Vue components...
 */
Vue.component("survey-test", require('./components/TestComponent.vue'));
Vue.component('survey-editor', require('./components/SurveyEditor.vue'));


const app = new Vue({
    el: '#survey-manager'
});
