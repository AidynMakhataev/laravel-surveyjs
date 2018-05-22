<template>
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Survey {{survey.name}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete" @click.prevent="deleteSurvey(survey.id)">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'delete-modal',
        props: ['survey'],
        methods: {
            deleteSurvey(id){
                axios.delete('/survey/' + id)
                    .then((response) => {
                        if(response.status === 200) {
                            this.removeStyles();
                            this.$toastr.s(response.data.message);
                            this.$emit('deleted');
                        }
                    })
            },
            removeStyles()
            {
                document.getElementById("deleteEmployeeModal").classList.remove('in');
                document.getElementsByClassName("modal-backdrop fade in")[0].remove();
                document.body.classList.remove("modal-open");
                document.body.removeAttribute("style");
            }
        }
    }
</script>