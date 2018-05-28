<template>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>{{surveyData.name}} <b>Results</b> </h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" v-if="!spinner">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>IP_Address</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="result in results" :key="result.id" v-if="results.length > 0">
                    <td>{{result.id}}</td>
                    <td>{{result.ip_address}}</td>
                </tr>
                </tbody>
            </table>
            <vue-simple-spinner size="medium" message="Loading..."  line-fg-color="#179d82" v-else></vue-simple-spinner>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'survey-result',
        props: ['survey'],
        data () {
            return {
                surveyData: this.survey,
                results: [],
                pagination: {},
                spinner: false
            }
        },
        mounted () {
            this.getSurveyResults(this.surveyData.id)
        },
        methods: {
            getSurveyResults(id, page = 1) {
                this.spinner = true;
                axios.get('/survey/' + id + '/result?page=' + page)
                    .then((response) => {
                        this.results = response.data.data;
                        this.pagination = response.data.meta;
                        this.spinner = false;
                    })
                    .catch((error) => {
                        console.info(error.response);
                        this.spinner = false;
                    })
            }
        }
    }
</script>