<template>
    <section>
        <b-field :label="trans('posts.publication_options')" a>
            <b-switch
                :rounded="false"
                v-model="published"
                type="is-success">{{ trans('posts.published') }}
            </b-switch>
            <b-switch
                :rounded="false"
                v-model="featured"
                type="is-success">{{ trans('posts.featured') }}
            </b-switch>
        </b-field>

        <b-field :label="trans('posts.title')"
                 :type="this.fieldType('title')"
                 :message="this.getError('title', this.errors)">
            <b-input type="text"
                     v-model="title"
                     required/>
        </b-field>

        <b-field :label="trans('posts.body')"
                 :type="this.fieldType('body')"
                 :message="this.getError('body', this.errors)">
            <div id="editor"></div>
        </b-field>
        <b-button @click="this.store" type="is-primary" expanded :loading="this.loading">
            {{ this.trans('common.actions.save') }}
        </b-button>
    </section>
</template>
<script>

import Editor from '@toast-ui/editor';

export default {
    data() {
        return {
            title: this.post.title,
            published: this.post.published,
            featured: this.post.featured,
            errors: [],
            loading: false,
            editor: null,
        };
    },
    props: {
        post: {
            type: Object,
            required: true,
        }
    },
    methods: {
        store() {
            this.loading = true;
            let post = {
                body: this.editor.getMarkdown(),
                title: this.title,
                published: this.published,
                featured: this.featured,
            };
            axios.put(this.apiRoute(`admin/posts/${this.post.id}`), post)
                .then(({data}) => {
                    window.location.href = data.data.links.show;
                })
                .catch(error => {
                    if (error.data.errors) {
                        this.errors = error.data.errors;
                    }
                    this.loading = false;
                });
        },
        fieldType(inputName) {
            return this.hasError(inputName, this.errors) ? 'is-danger' : null;
        },
    },
    mounted() {
        this.editor = new Editor({
            el: document.querySelector('#editor'),
            height: 'auto',
            initialEditType: 'markdown',
            initialValue: this.post.body,
            hideModeSwitch: true,
            usageStatistics: false,
            language: window._locale,
            previewStyle: 'tab',
        });
    }
}
</script>
