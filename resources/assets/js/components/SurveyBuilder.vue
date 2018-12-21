<template>
    <div>
        <div id="surveyEditorContainer">
        </div>
    </div>
</template>


<script>
    import * as SurveyEditor from 'surveyjs-editor'
    import 'surveyjs-editor/surveyeditor.css';

    import * as SurveyKo from "survey-knockout";
    import * as widgets from "surveyjs-widgets";

    Object.filter = (obj, predicate) =>
        Object.keys(obj)
            .filter( key => predicate(obj[key]) )
            .reduce( (res, key) => Object.assign(res, { [key]: obj[key] }), {} );

    const widgetsList = Object.filter(SurveyConfig.widgets, widget => widget === true);

    Object.keys(widgetsList).forEach(function (widget) {
        widgets[widget](SurveyKo);
    });

    export default {
        name: 'survey-builder',
        props: ['json', 'id'],
        data () {
            return {
                surveyData: this.json,
                surveyId: this.id
            }
        },
        mounted () {
            let editorOptions = SurveyConfig.builder;
            SurveyEditor.StylesManager.applyTheme(SurveyConfig.builder.theme);
            this.editor = new SurveyEditor.SurveyEditor('surveyEditorContainer', editorOptions);
            this.editor.text = JSON.stringify(this.surveyData);
            let self = this;
            this.editor.saveSurveyFunc = function () {
                axios.put('/survey/' + self.id, {json: JSON.parse(this.text)})
                    .then((response) => {
                        self.editor.text = JSON.stringify(response.data.data.json);
                        self.$root.snackbar = true;
                        self.$root.snackbarMsg = response.data.message;
                    })
                    .catch((error) => {
                        console.error(error.response);
                    })
            };
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
    .btn-primary {
        background-color: #1976d2 !important
    }
</style>