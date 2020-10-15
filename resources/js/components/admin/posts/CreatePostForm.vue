<template>
    <section>
        <b-field :label="__('posts.publication_options')" a>
            <b-switch
                :rounded="false"
                v-model="post.published"
                type="is-success">{{ __('posts.published') }}</b-switch>
            <b-switch
                :rounded="false"
                v-model="post.featured"
                type="is-success">{{ __('posts.featured') }}</b-switch>
        </b-field>

        <b-field :label="__('posts.title')"
                 :type="this.fieldType('title')"
                 :message="this.getError('title', this.errors)">
            <b-input type="text"
                     v-model="post.title"
                     required/>
        </b-field>

        <b-field :label="__('posts.summary')"
                 :type="this.fieldType('summary')"
                 :message="this.getError('summary', this.errors)">
            <b-input type="textarea"
                     minlenght="50"
                     maxlength="254"
                     v-model="post.summary"
                     required/>
        </b-field>

        <b-field :label="__('posts.body')"
                 :type="this.fieldType('body')"
                 :message="this.getError('body', this.errors)">
            <b-input type="textarea"
                     v-model="post.body"
                     rows="30"
                     required/>
        </b-field>
        <b-button @click="this.store" type="is-primary" expanded :loading="this.loading">
            {{ this.__('common.actions.save') }}
        </b-button>
    </section>
</template>
<script>
export default {
    data() {
        return {
            post: {
                title: null,
                summary: null,
                body: null,
                published: true,
                featured: false,
            },
            errors: [],
            loading: false,
        };
    },
    methods: {
        store() {
            this.loading = true;
            axios.post(this.apiRoute('admin/posts'), this.post)
                .then(({data}) => {
                    this.post = {
                        title: null,
                        summary: null,
                        body: null,
                        published: false,
                        featured: false,
                    };
                    this.errors = [];
                    this.loading = false;
                })
                .catch(error => {
                    if (error.data.errors) {
                        this.errors = error.data.errors;
                    }
                    this.loading = false;
                });
        },
        togglePublished() {
            this.published = !this.published;
        },
        toggleFeatured() {
            this.featured = !this.featured;
        },
        fieldType(inputName) {
            return this.hasError(inputName, this.errors) ? 'is-danger' : null;
        }
    }
}
</script>
