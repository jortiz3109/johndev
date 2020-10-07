<template>
    <span @click="toggle" class="tag is-light" :class="this.featuredStatus ? 'is-success' : 'is-danger'" style="cursor: pointer">
        <b-icon icon="star" pack="fas" :type="this.featuredStatus ? 'is-success' : 'is-danger'"></b-icon>
    </span>
</template>
<script>
const API_PATH = '/api/admin/posts/{POST}/toggle-featured'
export default {
    props: {
        featured: {
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
          featuredStatus: this.featured,
      }
    },
    methods: {
        toggle() {
            let route = API_PATH.replace('{POST}', this.post.toString());

            axios.post(route)
                .then(({data}) => {
                    eventBus.$emit('success-notification-message', data.message);
                    this.featuredStatus = data.featured;
                })
        }
    }
}
</script>
