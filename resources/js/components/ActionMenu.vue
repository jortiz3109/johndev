<template>
    <div class="buttons is-pulled-right">
        <b-button
            tag="a"
            :href="this.showRoute"
            size="is-small"
            type="is-primary"
            icon-left="eye"
            icon-pack="fas"
            :title="trans('common.actions.show')"
            inverted />
        <b-button
            tag="a"
            :href="this.editRoute"
            size="is-small"
            type="is-info"
            icon-left="edit"
            icon-pack="fas"
            :title="trans('common.actions.edit')"
            inverted />
        <b-button
            @click="this.destroy"
            size="is-small"
            type="is-danger"
            icon-left="trash"
            icon-pack="fas"
            :title="trans('common.actions.delete')"
            inverted />
    </div>
</template>
<script>
export default {
    props: {
        post: {
            type: String,
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
                title: this.trans('posts.messages.delete.title'),
                message: this.trans('posts.messages.delete.message'),
                confirmText: this.trans('posts.messages.delete.confirm'),
                cancelText: this.trans('common.actions.cancel'),
            });
        }
    }
}
</script>
