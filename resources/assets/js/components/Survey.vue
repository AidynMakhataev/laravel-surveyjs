<template>
    <div id="surveyElement">
        <survey :survey="json"></survey>
    </div>
</template>

<script>
    import * as SurveyVue from 'survey-vue';
    import 'bootstrap/dist/css/bootstrap.css';
    var Survey = SurveyVue.Survey;
    // Survey.cssType = "bootstrap";

    export default {
        name: 'show-survey',
        components: {
            Survey
        },
        props: ['surveyData'],
        data () {
            return {
                json: new SurveyVue.Model(this.surveyData.json)
            }
        },
        mounted() {
            this.json.onComplete.add(function (result) {
               console.log(result.data);
            });
        }
    }
</script>