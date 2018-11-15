/**
 * Import admin spa components
 */

import SurveyList from './components/SurveyList.vue';
import SurveyEditor from './components/SurveyEditor.vue';
import SurveyResult from './components/SurveyResult.vue';
import VueRouter from "vue-router";

/**
 *  SPA routes
 */
const routes = [
    { path: '/', component: SurveyList, name: 'home'},
    { path: '/:id', component: SurveyEditor, name: 'editor'},
    { path: '/:id/results', component: SurveyResult, name: 'result'}
];

export default new VueRouter({
    mode: 'history',
    base: '/' + SurveyConfig.admin_prefix + '/survey',
    routes
});