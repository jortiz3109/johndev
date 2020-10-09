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
            inverted />
        <b-button
            tag="a"
            :href="this.editRoute"
            size="is-small"
            type="is-info"
            icon-left="edit"
            icon-pack="fas"
            :title="__('common.actions.edit')"
            inverted />
        <b-button
            @click="this.destroy"
            size="is-small"
            type="is-danger"
            icon-left="trash"
            icon-pack="fas"
            :title="__('common.actions.delete')"
            inverted />
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
            return this.webRoute(`admin/posts/${this.post}`);
        },
        editRoute: function() {
            return this.webRoute(`admin/posts/${this.post}/edit`);
        },
        deleteRoute: function() {
            return this.apiRoute(`admin/posts/${this.post}`);
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
