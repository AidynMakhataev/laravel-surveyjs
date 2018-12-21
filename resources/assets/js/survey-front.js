require("./base")

window.Vue = require("vue")

Vue.component('survey-show', require('./components/SurveyShow.vue'))

new Vue({
    el: "#surveyElement"
})