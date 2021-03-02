<template>
    <b-button
        @click="toggle"
        :type="this.featuredStatus ? 'is-success' : 'is-light'"
        icon-pack="fas"
        icon-left="star"
        size="small"></b-button>
</template>
<script>
export default {
    props: {
        featured: {
            type: Boolean,
            required: true,
        },
        post: {
            type: String,
            required: true,
        },
    },
    data() {
      return {
          featuredStatus: this.featured,
      }
    },
    methods: {
        toggle() {
            let route = this.apiRoute(`admin/posts/${this.post}/toggle-featured`);
            axios.post(route)
                .then(({data}) => {
                    this.featuredStatus = data.data.featured;
                })
        }
    }
}
</script>
