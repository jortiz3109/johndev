<template>
    <div class="buttons is-pulled-right">
        <b-button
            tag="a"
            :href="showRoute"
            size="is-small"
            type="is-primary"
            icon-left="eye"
            icon-pack="fas"
            :title="__('common.actions.show')"
            outlined />
        <b-button
            tag="a"
            :href="editRoute"
            size="is-small"
            type="is-info"
            icon-left="edit"
            icon-pack="fas"
            :title="__('common.actions.edit')"
            outlined />
        <b-button
            @click="confirmDeletion"
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
        showRoute: {
            type: String,
            required: true
        },
        editRoute: {
            type: String,
            required: true
        },
        deleteRoute: {
            type: String,
            required: true
        },
        iconPack: {
            type: String,
            default: 'fas'
        },
        hasIcon: {
            type: Boolean,
            default: false
        },
    },
    methods: {
        delete() {
            eventBus.$emit('delete-item', {route: this.deleteRoute});
        },
        confirmDeletion() {
            this.$buefy.dialog.confirm({
                title: this.__('posts.messages.delete.title'),
                message: this.__('posts.messages.delete.message'),
                confirmText: this.__('posts.messages.delete.confirm'),
                cancelText: this.__('common.actions.cancel'),
                type: 'is-danger',
                hasIcon: this.hasIcon,
                iconPack: this.iconPack,
                onConfirm: () => this.delete()
            })
        }
    }
}
</script>
