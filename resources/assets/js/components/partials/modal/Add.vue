<template>
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form @submit.prevent="addSurvey">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Survey</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div :class="['form-group', {'has-error': Object.keys(errors).length !== 0 && errors.constructor === Object}]">
                            <label>Name</label>
                            <input type="text" v-model="name" class="form-control" required>
                            <span class="help-block" v-if="Object.keys(errors).length !== 0 && errors.constructor === Object" v-for="error in errors">
                                {{ error[0] }}
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'add-modal',
        data () {
            return {
                name: '',
                errors: {}
            }
        },
        methods: {
            addSurvey() {
                let data = {
                    name: this.name,
                    json: {
                        pages: []
                    }
                };
                axios.post('/survey', data)
                    .then((response) => {
                        if(response.status === 201) {
                            this.name = '';
                            this.removeStyles();
                            this.$toastr.s(response.data.message);
                            window.location.replace('/' + SurveyConfig.route_prefix + '/editor/' + response.data.data.id);
                        }
                    })
                    .catch((error) => {
                        console.error(error.response);
                        this.errors = error.response.data.errors
                    })
            },
            removeStyles()
            {
                document.getElementById("addEmployeeModal").classList.remove('in');
                document.getElementsByClassName("modal-backdrop fade in")[0].remove();
                document.body.classList.remove("modal-open");
                document.body.removeAttribute("style");
            }
        }
    }
</script>