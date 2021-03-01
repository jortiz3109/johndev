<template>
    <textarea v-bind="$attrs"></textarea>
</template>
<script>
import 'jodit/build/jodit.min.css'
import {Jodit} from 'jodit'

export default {
    name: 'EditorComponent',
    props: {
        value: {type: String, default: null},
        buttons: {type: Array, default: null},
        config: {
            type: Object,
            default: () => ({
                "uploader": {
                    "insertImageAsBase64URI": true
                },
                "toolbarButtonSize": "small"
            })
        }
    },
    data: () => ({editor: null}),
    mounted() {
        this.editor = new Jodit(this.$el, this.editorConfig)
        this.editor.value = this.value
        this.editor.events.on('change', newValue => this.$emit('input', newValue))
    },
    computed: {
        editorConfig() {
            const config = {...this.config}
            if (this.buttons) {
                config.buttons = this.buttons
                config.buttonsMD = this.buttons
                config.buttonsSM = this.buttons
                config.buttonsXS = this.buttons
            }
            return config
        }
    },
    watch: {
        value(newValue) {
            if (this.editor.value !== newValue) this.editor.value = newValue
        }
    },
    beforeDestroy() {
        this.editor.destruct()
    }
}
</script>
