<template>
    <b-button
        @click="toggle"
        :type="this.publishedStatus ? 'is-success' : 'is-light'"
        icon-pack="fas"
        icon-left="check"
        size="small"></b-button>
</template>
<script>
export default {
    props: {
        published: {
            type: Boolean,
            required: true,
        },
        post: {
            type: Number,
            required: true,
        },
    },
    data() {
      return {
          publishedStatus: this.published,
      }
    },
    methods: {
        toggle() {
            let route = this.apiRoute(`admin/posts/${this.post}/toggle-published`);

            axios.post(route)
                .then(({data}) => {
                    this.publishedStatus = data.data.published;
                })
        }
    }
}
</script>
