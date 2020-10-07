<template>
    <div class="buttons is-pulled-right">
        <b-button
            tag="a"
            :href="this.showRoute"
            size="is-small"
            type="is-primary"
            icon-left="eye"
            icon-pack="fas"
            :title="__('common.actions.show')"
            outlined />
        <b-button
            tag="a"
            :href="this.editRoute"
            size="is-small"
            type="is-info"
            icon-left="edit"
            icon-pack="fas"
            :title="__('common.actions.edit')"
            outlined />
        <b-button
            @click="this.destroy"
            size="is-small"
            type="is-danger"
            icon-left="trash"
            icon-pack="fas"
            :title="__('common.actions.delete')"
            outlined />
    </div>
</template>
<script>
export default {
    props: {
        post: {
            type: Number,
            required: true
        },
    },
    computed: {
        showRoute: function() {
            return ['admin', 'posts', this.post].join('/');
        },
        editRoute: function() {
            return ['admin', 'posts', this.post, 'edit'].join('/');
        },
        deleteRoute: function() {
            return ['api', 'admin', 'posts', this.post].join('/');
        },
    },
    methods: {
        destroy() {
            eventBus.$emit('delete-item', {
                route: this.deleteRoute,
                title: this.__('posts.messages.delete.title'),
                message: this.__('posts.messages.delete.message'),
                confirmText: this.__('posts.messages.delete.confirm'),
                cancelText: this.__('common.actions.cancel'),
            });
        }
    }
}
</script>
