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
            let self = this;
            this.json.onComplete.add(function (result) {
               let postData = {
                   json: result.data
               };
               axios.post('/survey/' + self.surveyData.id + '/result', postData)
                   .then((response) => {
                       console.log(response);
                   })
                   .catch((error) => {
                       console.error(error.response);
                   })
            });
        }
    }
</script>