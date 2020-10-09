<template>
    <b-table
        ref="table"
        :striped="true"
        :hoverable="true"
        :data="data"
        :loading="loading"
        paginated
        backend-pagination
        :total="total"
        :per-page="perPage"

        @page-change="onPageChange"
        aria-next-label="Next page"
        aria-previous-label="Previous page"
        aria-page-label="Page"
        aria-current-label="Current page"
        icon-pack="fa">

        <b-table-column field="title" :label="__('posts.title')" v-slot="props">
            {{ props.row.title }}
            <div class="tags">
                <post-featured-tag :post="props.row.id" :featured="props.row.featured"></post-featured-tag>
                <post-published-tag :post="props.row.id" :published="props.row.published"></post-published-tag>
            </div>
        </b-table-column>

        <b-table-column field="author" width="200" :label="__('posts.author')" v-slot="props">
            {{ props.row.author.email }}
        </b-table-column>

        <b-table-column field="created_at" width="120" :label="__('common.created_at')" v-slot="props">
            {{ new Date(props.row.created_at).toLocaleDateString() }}
        </b-table-column>

        <b-table-column width="150" v-slot="props">
            <action-menu
                :post="props.row.id"
            ></action-menu>
        </b-table-column>

    </b-table>
</template>
<script>
export default {
    data() {
        return {
            data: [],
            total: 0,
            loading: false,
            page: 1,
            perPage: 15
        }
    },
    methods: {
        loadAsyncData() {
            let params = [
                `page=${this.page}`
            ].join('&');

            this.loading = true;
            axios.get(this.apiRoute(['/admin/posts', params].join('?')))
                .then(({data}) => {
                    this.data = []
                    this.total = data.meta.total
                    data.posts.forEach((item) => {
                        this.data.push(item)
                    })
                    this.loading = false
                })
                .catch((error) => {
                    this.data = []
                    this.total = 0
                    this.loading = false
                    throw error
                })
        },
        onPageChange(page) {
            this.page = page
            this.loadAsyncData()
        },
    },
    mounted() {
        this.loadAsyncData();
        eventBus.$on('item-deleted-successfully', () => {
            this.loadAsyncData();
        });
        eventBus.$on('item-changed', () => {
            this.loadAsyncData();
        });
    }
}
</script>
