<template>
    <div class="sv_container">
        <div class="sv_header">
            <h3>
                <span id="sjs_editor_title_edit" class="editor_title_edit" v-if="edit">
                    <input style="border-top: none; border-left: none; border-right: none; outline: none;" v-model="name" />
                    <span class="btn btn-success" onclick="postEdit()" style="border-radius: 2px; margin-top: -8px; background-color: #1ab394; border-color: #1ab394;">Update</span>
                    <span class="btn btn-warning" @click="onCancelEdit()" style="border-radius: 2px; margin-top: -8px;">Cancel</span>
                </span>
                <span id="sjs_editor_title_show" v-else>
                        <span style="padding-top: 1px; height: 39px; display: inline-block;">{{name}}</span>
                        <span class="edit-survey-name" @click="edit = true" title="Change Name">
                            <img class="edit-icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iIzFBQjM5NCIgZD0iTTE5LDRsLTksOWw0LDRsOS05TDE5LDR6Ii8+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiMxQUIzOTQiIGQ9Ik04LDE1djRoNEw4LDE1eiIvPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBmaWxsPSIjMUFCMzk0IiBkPSJNMSwxN3YyaDR2LTJIMXoiLz48L2c+PC9zdmc+"
                                 style="width:24px; height:24px; margin-top: -5px;" />
                        </span>
                    </span>
            </h3>
        </div>
        <div class="sv_body">
            <div id="survey-manager">
                <survey-builder :json="json"></survey-builder>
            </div>
        </div>
    </div>
</template>

<script>
    import SurveyBuilder from './../components/SurveyBuilder'

    export default {
        components: {
            SurveyBuilder
        },
        props: ['survey'],
        data () {
            return {
                name: this.survey.name,
                json: this.survey.json,
                edit: false
            }
        },
        methods: {
            onCancelEdit() {
                this.edit = false;
            }
        }
    }
</script>