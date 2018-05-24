/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./base");

window.Vue = require("vue");

import Toastr from 'vue-toastr';
require('vue-toastr/src/vue-toastr.scss');
Vue.use(Toastr);
/**
 * Register Vue components...
 */
Vue.component("survey-test", require('./components/TestComponent.vue'));
Vue.component('survey-editor', require('./components/SurveyEditor.vue'));
Vue.component('survey-list', require('./components/SurveyList.vue'));
Vue.component('show-survey', require('./components/Survey.vue'));


const app = new Vue({
    el: '#survey-manager'
});
