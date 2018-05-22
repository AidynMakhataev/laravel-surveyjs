<template>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Surveys</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Survey</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" v-if="!spinner">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="survey in surveys" :key="survey.id" >
                    <td>{{survey.id}}</td>
                    <td>{{survey.name}}</td>
                    <td>
                        <a href="javascript:void(0)" class="edit" @click="onEdit(survey.id)">
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a href="#deleteEmployeeModal" class="delete" @click="onDelete(survey)" data-toggle="modal">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
            <vue-simple-spinner size="medium" message="Loading..."  line-fg-color="#179d82" v-else></vue-simple-spinner>
            <pagination :pagination="pagination" :offset="4" @paginate="getSurveys"></pagination>
        </div>

        <add-modal @added="getSurveys"></add-modal>

        <delete-modal :survey="chosenSurvey" @deleted="getSurveys"></delete-modal>
    </div>
</template>

<script>
    import Pagination from './../components/partials/Pagination.vue'
    import DeleteModal from './../components/partials/modal/Delete.vue'
    import AddModal from './../components/partials/modal/Add.vue'
    import Spinner from 'vue-simple-spinner'
    export default {
        data () {
            return {
                surveys: [],
                pagination: {},
                total: 0,
                chosenSurvey: {},
                spinner: false
            }
        },
        components: {
            Pagination, DeleteModal, Spinner, AddModal
        },
        mounted() {
            this.getSurveys();
            this.countTotal();
        },
        methods: {
            getSurveys(page = 1) {
                this.spinner = true;
                axios.get('/survey?page='+page)
                    .then((response) => {
                        this.surveys = response.data.data;
                        this.pagination = response.data.meta;
                        this.spinner = false;
                    })
                    .catch((error) => {
                        console.info(error.response);
                        this.spinner = false;
                    })
            },
            countTotal() {
                this.total = this.surveys.length;
            },
            onEdit(id) {
                window.location.replace('/' + SurveyConfig.routePrefix + '/editor/' + id)
            },
            onDelete(survey) {
                this.chosenSurvey = survey;
            }
        }
    }
</script>