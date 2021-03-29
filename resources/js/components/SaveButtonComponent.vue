<template>
    <b-button @click="checkValidity()" icon-pack="fas" icon-left="save" type="is-primary" native-type="submit" expanded :loading="this.loading">
        <slot/>
    </b-button>
</template>
<script>
export default {
    data() {
        return {
            loading: false,
        }
    },
    props: {
        form: {
            type: String,
            required: true
        }
    },
    methods: {
        checkValidity() {
            this.toggle();
            const form = document.getElementById(this.form);
            if (false === form.checkValidity()) {
                this.toggle();
            }
        },
        toggle() {
            this.loading = !this.loading;
        }
    }
}
</script>
