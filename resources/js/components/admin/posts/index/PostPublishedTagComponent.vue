<template>
    <span @click="toggle" class="tag is-light" :class="this.publishedStatus ? 'is-success' : 'is-danger'" style="cursor: pointer">
        <b-icon icon="check" pack="fas" :type="this.publishedStatus ? 'is-success' : 'is-danger'"></b-icon>
    </span>
</template>
<script>
const API_PATH = '/api/admin/posts/{POST}/toggle-published'
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
            let route = API_PATH.replace('{POST}', this.post.toString());

            axios.post(route)
                .then(({data}) => {
                    eventBus.$emit('success-notification-message', data.message);
                    this.publishedStatus = data.published;
                })
        }
    }
}
</script>
