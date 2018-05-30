/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./base");

window.Vue = require("vue");
window.Vuetify = require('vuetify');
Vue.use(Vuetify);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * Import admin spa components
 */

import SurveyList from './components/SurveyList.vue';
import SurveyEditor from './components/SurveyEditor.vue';
import SurveyResult from './components/SurveyResult.vue';


/**
 *  SPA routes
 */
const routes = [
    { path: '/', component: SurveyList, name: 'home'},
    { path: '/:id', component: SurveyEditor, name: 'editor'},
    { path: '/:id/results', component: SurveyResult, name: 'result'}
];

const router = new VueRouter({
    mode: 'history',
    base: '/' + SurveyConfig.admin_prefix + '/survey',
    routes
});


const app = new Vue({
    el: '#survey-manager',
    data () {
      return {
          snackbar: false,
          snackbarMsg: ''
      }
    },
    router
});
