<script>
export default {
    render: () => null,
    data() {
        return {
            route: null,
        }
    },
    methods: {
        delete() {
            axios.delete(this.route)
                .then(({data}) => {
                    eventBus.$emit('success-notification-message', data.message);
                    eventBus.$emit('item-deleted-successfully');
                })
                .catch((error) => {
                    this.id = null;
                    this.route = null;
                    throw error
                })
        },
    },
    mounted() {
        eventBus.$on('delete-item', params => {
            this.route = params.route;
            this.delete();
        });
    },
}
</script>
