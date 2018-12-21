<template>
    <div>
        <survey :survey="survey"></survey>
    </div>
</template>

<script>
    import * as SurveyVue from 'survey-vue'

    const Survey = SurveyVue.Survey
    SurveyVue.StylesManager.applyTheme(SurveyConfig.theme)

    import * as widgets from "surveyjs-widgets";

    Object.filter = (obj, predicate) =>
        Object.keys(obj)
            .filter( key => predicate(obj[key]) )
            .reduce( (res, key) => Object.assign(res, { [key]: obj[key] }), {} );

    const widgetsList = Object.filter(SurveyConfig.widgets, widget => widget === true);

    Object.keys(widgetsList).forEach(function (widget) {
        widgets[widget](SurveyVue);
    });

    export default {
        components: {
            Survey
        },
        props: ['surveyData'],
        data () {
            return {
                survey: {}
            }
        },
        created () {
            this.survey = new SurveyVue.Model(this.surveyData.json)
        },
        mounted () {
            this.survey.onComplete.add((result) => {
                let url = `/survey/${this.surveyData.id}/result`
                axios.post(url, {json: result.data})
                    .then((response) => {
                        console.log(response)
                    })
            })
        }
    }
</script>
