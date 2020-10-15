<script>
export default {
    render: () => null,
    data() {
        return {
            message: null,
            type: null,
            duration: null,
        }
    },
    props: {
        queue: {
            type: Boolean,
            default: false,
        },
        position: {
            type: String,
            default: 'is-bottom',
        }
    },
    methods: {
        notify() {
            this.$buefy.toast.open({
                message: this.message,
                type: this.type,
                duration: this.duration,
                queue: this.queue,
                position: this.position,
            })
        },
        setDefaultParams() {
            this.message = null;
            this.type = null;
            this.duration = null;
        }
    },
    mounted() {
        eventBus.$on('simple-notification-message', message => {
            this.setDefaultParams();
            this.message = message;
            this.notify();
        });

        eventBus.$on('success-notification-message', message => {
            this.setDefaultParams();
            this.message = message;
            this.type = 'is-success';
            this.notify();
        });

        eventBus.$on('warning-notification-message', message => {
            this.setDefaultParams();
            this.message = message;
            this.type = 'is-warning';
            this.notify();
        });

        eventBus.$on('danger-notification-message', message => {
            this.setDefaultParams();
            this.message = message;
            this.duration = 5000;
            this.type = 'is-danger';
            this.notify();
        });
    },
}
</script>
