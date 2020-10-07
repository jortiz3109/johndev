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
        iconPack: {
            type: String,
            default: 'fas'
        },
        hasIcon: {
            type: Boolean,
            default: false
        },
        queue: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        notify() {
            this.$buefy.notification.open({
                message: this.message,
                type: this.type,
                duration: this.duration,
                hasIcon: this.hasIcon,
                iconPack: this.iconPack,
                queue: this.queue,
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
