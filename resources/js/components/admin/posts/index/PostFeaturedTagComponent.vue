<template>
    <span @click="toggle" class="tag is-light" :class="this.featuredStatus ? 'is-success' : 'is-danger'" style="cursor: pointer">
        <b-icon icon="star" pack="fas" :type="this.featuredStatus ? 'is-success' : 'is-danger'"></b-icon>
    </span>
</template>
<script>
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
            let route = this.apiRoute(`admin/posts/${this.post}/toggle-featured`);
            axios.post(route)
                .then(({data}) => {
                    eventBus.$emit('success-notification-message', data.message);
                    this.featuredStatus = data.featured;
                })
        }
    }
}
</script>
