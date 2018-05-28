<template>
    <div>
        <v-card>
            <v-card-title>
                List of all available surveys
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px" content-class="remove-overflow">
                    <v-btn slot="activator" color="primary" dark class="mb-2">New Survey</v-btn>
                    <v-card>
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>
                        <v-card-text>
                            <v-container grid-list-md>
                                <v-layout wrap>
                                    <v-flex xs12 sm6 md4>
                                        <v-text-field v-model="editedItem.name" label="Survey name"></v-text-field>
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
            </v-card-title>
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
                        <v-btn icon class="mx-0" @click="editItem(props.item)">
                            <v-icon color="teal">edit</v-icon>
                        </v-btn>
                        <v-btn icon class="mx-0" @click="deleteItem(props.item)">
                            <v-icon color="pink">delete</v-icon>
                        </v-btn>
                    </td>
                </template>
                <template slot="no-data">
                    <v-btn color="primary" @click="initialize">Reset</v-btn>
                </template>
            </v-data-table>
            <div class="text-xs-center pt-2">
                <v-pagination v-model="page" :length="pageLength" :total-visible="7"></v-pagination>
            </div>
            <v-snackbar
                :timeout="6000"
                bottom
                right
                multi-line
                v-model="snackbar"
            >
                {{ snackbarMsg }}
                <v-btn flat color="blue" @click.native="snackbar = false"></v-btn>
            </v-snackbar>

        </v-card>


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
                snackbar: false,
                snackbarMsg: '',
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
                        this.surveys = response.data.data;
                    })
                    .catch((error) => {
                        this.loading = false;
                        console.info(error.response);
                    })
            },
            initialize() {

            },
            editItem() {

            },
            deleteItem(item) {
                if(confirm('Are you sure you want to delete this survey?')) {
                    this.snackbar = true;
                    axios.delete('/survey/' + item.id)
                        .then((response) => {
                            if(response.status === 200) {
                                this.snackbarMsg = response.data.message;
                                this.snackbar = true;
                            }
                        });
                    this.getSurveys();
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
                            this.snackbar = true;
                            this.snackbarMsg = response.data.message;
                            this.editedItem = Object.assign({}, {name: ''});
                            this.getSurveys();
                        }
                    })
            }
        }
    }
</script>

<style>
    .remove-overflow {
        overflow: inherit;
    }
</style>