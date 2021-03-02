<script>
export default {
    render: () => null,
    data() {
        return {
            route: null,
            title: null,
            message: null,
            confirmText: null,
            cancelText: null,
        }
    },
    props: {
        iconPack: {
            type: String,
            default: 'fas'
        },
        hasIcon: {
            type: Boolean,
            default: true
        },
    },
    methods: {
        delete() {
            axios.delete(this.route)
                .then(({data}) => {
                    eventBus.$emit('item-deleted-successfully');
                })
                .catch((error) => {
                    this.route = null;
                    this.title = null;
                    this.message = null;
                    this.confirmText = null;
                    this.cancelText = null;
                    throw error
                })
        },
        confirmDeletion() {
            this.$buefy.dialog.confirm({
                title: this.title,
                message: this.message,
                confirmText: this.confirmText,
                cancelText: this.cancelText,
                type: 'is-danger',
                hasIcon: this.hasIcon,
                iconPack: this.iconPack,
                onConfirm: () => this.delete()
            })
        }
    },
    mounted() {
        eventBus.$on('delete-item', params => {
            this.route = params.route;
            this.title = params.title;
            this.message = params.message;
            this.confirmText = params.confirmText;
            this.cancelText = params.cancelText;
            this.confirmDeletion();
        });
    },
}
</script>
