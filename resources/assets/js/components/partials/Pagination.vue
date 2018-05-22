<template>
    <div class="clearfix">
        <!--<div class="hint-text">Showing <b>5</b> out of <b>{{pagination.total}}</b> entries</div>-->
        <ul class="pagination">
            <li class="page-item" v-if="pagination.current_page > 1">
                <a href="javascript:void(0)" @click.prevent="changePage(pagination.current_page - 1)">
                    Previous
                </a>
            </li>
            <li class="page-item" v-for="(page,index) in pagesNumber" :key="index" :class="['page-item', {'active': page === pagination.current_page}]">
                <a href="javascript:void(0)" class="page-link" @click.prevent="changePage(page)">
                    {{ page }}
                </a>
            </li>
            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                <a href="javascript:void(0)" class="page-link" @click.prevent="changePage(pagination.current_page + 1)">
                    Next
                </a>
            </li>
        </ul>
    </div>
</template>
<script>
    export default{
        name: 'pagination',
        props: {
            pagination: {
                type: Object,
                required: true
            },
            offset: {
                type: Number,
                default: 4
            }
        },
        computed: {
            pagesNumber() {
                if (!this.pagination.to) {
                    return [];
                }
                let from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                let to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        },
        methods : {
            changePage(page) {
                this.pagination.current_page = page;
                this.$emit('paginate', page);
            }
        }
    }
</script>
