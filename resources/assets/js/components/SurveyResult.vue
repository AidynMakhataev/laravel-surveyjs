<template>
    <div>
        <v-toolbar>
            <v-btn icon class="mb-3" @click.native = "$router.push({name: 'home'})">
                <v-icon large>home</v-icon>
            </v-btn>
            <v-toolbar-title>Survey #{{surveyId}} Results</v-toolbar-title>
        </v-toolbar>
        <v-data-table
                :headers="headers"
                :items="results"
                :loading="loading"
                hide-actions
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                    <td class="text-sm-left">{{ props.item.id }}</td>
                    <td class="text-sm-left">{{ props.item.ip_address }}</td>
                    <td class="text-sm-left">{{ props.item.created_at}}</td>
                    <td class="text-sm-left layout px-0">
                        <v-btn slot="activator" color="primary" dark @click.native.stop="showSurvey(props.item)">Show in Survey</v-btn>
                    </td>
            </template>
            <template slot="no-data">
                <v-alert :value="!results.length > 0" color="error" icon="warning">
                    Sorry, nothing to display here :(
                </v-alert>
                <v-btn color="primary" @click="getSurveyResults">Reset</v-btn>
            </template>
        </v-data-table>
        <div class="text-xs-center pt-2">
            <v-pagination v-model="page" :length="pageLength" :total-visible="7"></v-pagination>
        </div>

        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click.native="dialog = false">
                        <v-icon>close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Show in Survey</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
                <survey :survey="surveyData" v-if="Object.keys(surveyData).length"></survey>
            </v-card>
        </v-dialog>
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
        name: 'survey-result',
        components: {
            Survey
        },
        data () {
            return {
                results: [],
                loading: false,
                survey: {},
                dialog: false,
                surveyData: {},
                surveyId: this.$route.params.id,
                page: 1,
                pageLength: 1,
                headers: [
                    {
                        text: 'ID',
                        alignt: 'left',
                        value: 'id',
                        sortable: false
                    },
                    {
                        text: 'IP_ADDRESS',
                        value: 'ip_address',
                        sortable: false
                    },
                    {
                        text: 'Created date',
                        valie: 'created_at',
                        sortable: false
                    },
                    {
                        text: 'Actions',
                        value: 'actions',
                        sortable: false
                    }
                ],
            }
        },
        mounted () {
            this.getSurveyResults(this.$route.params.id);
        },
        watch: {
            page() {
                this.getSurveyResults();
            }
        },
        methods: {
            getSurveyResults(id = this.surveyId) {
                this.loading = true;
                axios.get('/survey/' + id + '/result?page=' + this.page)
                    .then((response) => {
                        this.results = response.data.data;
                        this.survey = response.data.meta.survey;
                        this.pageLength = Math.ceil(response.data.meta.total / response.data.meta.per_page);
                        this.loading = false;
                        this.surveyData = new SurveyVue.Model(response.data.meta.survey.json);
                        this.surveyData.mode = 'display';


                    })
                    .catch((error) => {
                        console.info(error.response);
                        this.loading = false;
                    });
            },
            showSurvey(result) {
                this.dialog = true;
                this.surveyData.data = result.json;
               }
        }
    }
</script>