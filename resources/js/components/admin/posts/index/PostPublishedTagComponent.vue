<template>
    <span @click="toggle" class="tag is-light" :class="this.publishedStatus ? 'is-success' : 'is-danger'" style="cursor: pointer">
        <b-icon icon="check" pack="fas" :type="this.publishedStatus ? 'is-success' : 'is-danger'"></b-icon>
    </span>
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
                    eventBus.$emit('success-notification-message', data.message);
                    this.publishedStatus = data.published;
                })
        }
    }
}
</script>
