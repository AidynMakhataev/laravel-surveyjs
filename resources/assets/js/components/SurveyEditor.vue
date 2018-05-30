<template>
    <div>
        <v-toolbar>
            <v-btn icon class="mb-3" @click.native = "$router.push({name: 'home'})">
                <v-icon large>home</v-icon>
            </v-btn>
            <v-toolbar-title @click.prevent="nameField = true" v-if="!nameField">{{surveyName}}</v-toolbar-title>
            <v-flex xs4 v-else>
                <v-spacer></v-spacer>
                <v-text-field
                        v-model="surveyName"
                        :rules="[
                                            () => !!surveyName || 'The field name is required',
                                            () => !!surveyName && surveyName.length >= 3 || 'Name must contain at least 3 character!',
                                            ]"
                ></v-text-field>
            </v-flex>
            <v-toolbar-items v-if="nameField">
                <v-btn small flat color="primary" @click.prevent="postEdit">Save</v-btn>
                <v-btn small flat color="warning" @click.prevent="onCancelEdit">Cancel</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <survey-builder :json="survey.json" :id="survey.id" v-if="Object.keys(survey).length"></survey-builder>
    </div>
</template>

<script>
    import SurveyBuilder from './../components/SurveyBuilder'

    export default {
        components: {
            SurveyBuilder
        },
        data () {
            return {
                survey: {},
                surveyName: '',
                nameField: false,

            }
        },
        mounted() {
            this.getSurvey(this.$route.params.id);
        },
        methods: {
            getSurvey(id) {
                axios.get('/survey/' + id)
                    .then((response) => {
                        this.survey = response.data.data;
                        this.surveyName = response.data.data.name;
                    })
                    .catch((error) => {
                        console.log(error.response)
                    })
            },
            onCancelEdit() {
                this.nameField = false;
                this.surveyName = this.survey.name;
            },
            postEdit() {
                axios.put('/survey/' + this.survey.id, {name: this.surveyName})
                    .then((response) => {
                        this.nameField = false;
                        this.$root.snackbarMsg = response.data.message;
                        this.$root.snackbar = true;
                    })
                    .catch((error) => {
                        console.error(error.response);
                    })
            }
        }
    }
</script>