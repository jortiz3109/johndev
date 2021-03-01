require('./bootstrap')
require('./buefy')
require('./event-bus')

Vue.mixin(require('./mixins/trans'))
Vue.mixin(require('./mixins/paths'))
Vue.mixin(require('./mixins/errors'))

window.axios.interceptors.response.use(
    function(response) {
        if (response.data.message) {
            eventBus.$emit('success-notification-message', response.data.message)
        }
        return response;
    },
    function(error) {
        let errorMessage = ('response.data.message' in error)
            ? error.response.data.message
            : 'An error occurred while processing your request';

        eventBus.$emit('danger-notification-message', errorMessage)
        return Promise.reject(error.response)
    }
)

import AdminPostsTableComponent from "./components/admin/posts/index/AdminPostsTableComponent"
Vue.component('admin-posts-table', AdminPostsTableComponent)

import PostFeaturedTagComponent from "./components/admin/posts/index/PostFeaturedTagComponent"
Vue.component('post-featured-tag', PostFeaturedTagComponent)

import PostPublishedTagComponent from "./components/admin/posts/index/PostPublishedTagComponent"
Vue.component('post-published-tag', PostPublishedTagComponent)

import NotificationComponent from "./components/NotificationComponent"
Vue.component('notification', NotificationComponent)

import DeleteItemFromBackend from "./components/DeleteItemFromBackend"
Vue.component('delete-item', DeleteItemFromBackend)

import ActionMenu from "./components/ActionMenu"
Vue.component('action-menu', ActionMenu)

import SaveButtonComponent from "./components/SaveButtonComponent"
Vue.component('save-button', SaveButtonComponent)

import LogoutComponent from "./components/LogoutComponent"
Vue.component('logout-component', LogoutComponent)

import EditorComponent from "./components/EditorComponent"
Vue.component('editor', EditorComponent)

const app = new Vue({
    el: '#app',
    mounted() {
        this.$on('auth:logout', () => {
            eventBus.$emit('auth:logout')
        })
    }
})
