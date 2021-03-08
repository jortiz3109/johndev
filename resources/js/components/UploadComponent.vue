<template>
    <b-upload v-bind="$attrs" v-model="file" :accept="this.accept" :native="true" expanded>
        <a class="button is-info is-fullwidth">
            <b-icon pack="fas" icon="upload"></b-icon>
            <span>{{ file.name || this.label }}</span>
        </a>
    </b-upload>
</template>

<script>
export default {
    props:{
        label: {
            type: String,
            required: true
        },
        accept: {
            type: String,
            default: null,
        }
    },
    data() {
        return {
            file: {}
        }
    }
}
</script>
