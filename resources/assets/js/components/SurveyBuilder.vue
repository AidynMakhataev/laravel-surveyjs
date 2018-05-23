<template>
    <div id="surveyEditorContainer">
    </div>
</template>


<script>
    import * as SurveyEditor from 'surveyjs-editor'
    import 'bootstrap/dist/css/bootstrap.css';
    import 'surveyjs-editor/surveyeditor.css';

    // import * as SurveyKo from "survey-knockout";
    // import * as widgets from "surveyjs-widgets";
    //
    // import "inputmask/dist/inputmask/phone-codes/phone.js";
    //
    // widgets.icheck(SurveyKo);
    // widgets.select2(SurveyKo);
    // widgets.imagepicker(SurveyKo);
    // widgets.inputmask(SurveyKo);
    // widgets.jquerybarrating(SurveyKo);
    // widgets.jqueryuidatepicker(SurveyKo);
    // widgets.nouislider(SurveyKo);
    // widgets.select2tagbox(SurveyKo);
    // widgets.signaturepad(SurveyKo);
    // widgets.sortablejs(SurveyKo);
    // widgets.ckeditor(SurveyKo);
    // widgets.autocomplete(SurveyKo);
    // widgets.bootstrapslider(SurveyKo);

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
                        self.$toastr.s(response.data.message);
                        self.editor.text = JSON.stringify(response.data.data.json);
                    })
                    .catch((error) => {
                        console.error(error.response);
                    })
            };
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>