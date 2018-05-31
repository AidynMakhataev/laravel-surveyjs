<template>
    <div>
        <v-toolbar>
            <v-toolbar-title>List of all available surveys</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-dialog flat v-model="dialog" max-width="500px" content-class="remove-overflow">
                <v-btn slot="activator" color="primary" dark class="mb-2">New Survey</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12>
                                    <v-text-field
                                            v-model="editedItem.name"
                                            label="Survey name"
                                            :rules="[
                                            () => !!editedItem.name || 'The field name is required',
                                            () => !!editedItem.name && editedItem.name.length >= 3 || 'Name must contain at least 3 character!',
                                            ]"
                                    >

                                    </v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click.native="onCloseModal">Cancel</v-btn>
                        <v-btn color="blue darken-1" flat @click.native="onSaveModal(editedItem.name)">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-toolbar>
        <v-data-table
                :headers="headers"
                :items="surveys"
                :loading="loading"
                hide-actions
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td class="text-sm-left">{{ props.item.id }}</td>
                <td class="text-sm-left">{{ props.item.name }}</td>
                <td class="text-sm-left">{{ props.item.created_at}}</td>
                <td class="justify-center layout px-0">
                    <v-btn icon class="mx-0" @click="runSurvey(props.item.slug)">
                        <v-icon color="teal">play_circle_outline</v-icon>
                    </v-btn>
                    <v-btn icon class="mx-0" @click="showResults(props.item.id)">
                        <v-icon color="indigo">question_answer</v-icon>
                    </v-btn>
                    <v-btn icon class="mx-0" @click="editItem(props.item.id)">
                        <v-icon color="amber">edit</v-icon>
                    </v-btn>
                    <v-btn icon class="mx-0" @click="deleteItem(props.item)">
                        <v-icon color="pink">delete</v-icon>
                    </v-btn>
                </td>
            </template>
            <template slot="no-data">
                <v-btn color="primary" @click="getSurveys">Reset</v-btn>
            </template>
        </v-data-table>
        <div class="text-xs-center pt-2">
            <v-pagination v-model="page" :length="pageLength" :total-visible="7"></v-pagination>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'survey-list',
        data () {
            return {
                surveys: [],
                page: 1,
                pageLength: 1,
                dialog: false,
                loading: false,
                formTitle: 'New Survey',
                headers: [
                    {
                        text: 'ID',
                        alignt: 'left',
                        value: 'id',
                        sortable: false
                    },
                    {
                        text: 'Name',
                        value: 'name',
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
                editedItem: {
                    name: ''
                },

            }
        },
        mounted() {
            this.getSurveys();
        },
        watch: {
            page() {
                this.getSurveys();
            }
        },
        methods: {
            getSurveys() {
                this.loading = true;
                axios.get('/survey', {
                    params: {
                        page: this.page
                    }
                })
                    .then((response) => {
                        if(response.status === 200) {
                            this.surveys = response.data.data;
                            this.pageLength = Math.ceil(response.data.meta.total / response.data.meta.per_page);
                            this.loading = false;
                        }
                    })
                    .catch((error) => {
                        this.loading = false;
                        console.info(error.response);
                    })
            },
            editItem(id) {
                this.$router.push({name: 'editor', params: {id: id}})
            },
            deleteItem(item) {
                if(confirm('Are you sure you want to delete this survey?')) {
                    this.snackbar = true;
                    axios.delete('/survey/' + item.id)
                        .then((response) => {
                            if(response.status === 200) {
                                this.$root.snackbarMsg = response.data.message;
                                this.$root.snackbar = true;
                            }
                        });
                    const index = this.surveys.indexOf(item);
                    this.surveys.splice(index, 1);
                }
            },
            onCloseModal() {
                this.dialog = false;
                this.editedItem = Object.assign({}, {name: ''})
            },
            onSaveModal(name) {
                this.loading = true;
                let data = {
                    name: name,
                    json: {
                        pages: []
                    }
                };
                axios.post('/survey', data)
                    .then((response) => {
                        if(response.status === 201) {
                            this.dialog = false;
                            this.loading = false;
                            this.$root.snackbarMsg = response.data.message;
                            this.$root.snackbar = true;
                            this.editedItem = Object.assign({}, {name: ''});
                            this.getSurveys();
                        }
                    })
            },
            runSurvey(slug) {
                window.open('/' + SurveyConfig.route_prefix + '/' + slug, '_blank');
            },
            showResults(id) {
                this.$router.push({name: 'result', params: {id: id} })
            }
        }
    }
</script>

<style>
    .remove-overflow {
        overflow: inherit;
    }
</style>