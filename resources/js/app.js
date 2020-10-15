require('./bootstrap');
require('./buefy');
require('./event-bus');

window.axios.interceptors.response.use(
    function(response) {
        if (response.data.message) {
            eventBus.$emit('success-notification-message', response.data.message);
        }
        return response;
    },
    function(error) {
        let errorMessage = 'An error occurred while processing your request';
        if (error.response.data.message) {
            errorMessage = error.response.data.message;
        }
        eventBus.$emit('danger-notification-message', errorMessage);
        return Promise.reject(error.response);
    }
);

Vue.mixin(require('./mixins/trans'));
Vue.mixin(require('./mixins/paths'));
Vue.mixin(require('./mixins/errors'));

import AdminPostsTableComponent from "./components/admin/posts/index/AdminPostsTableComponent";
Vue.component('admin-posts-table', AdminPostsTableComponent);

import PostFeaturedTagComponent from "./components/admin/posts/index/PostFeaturedTagComponent";
Vue.component('post-featured-tag', PostFeaturedTagComponent);

import PostPublishedTagComponent from "./components/admin/posts/index/PostPublishedTagComponent";
Vue.component('post-published-tag', PostPublishedTagComponent);

import NotificationComponent from "./components/NotificationComponent";
Vue.component('notification', NotificationComponent);

import DeleteItemFromBackend from "./components/DeleteItemFromBackend";
Vue.component('delete-item', DeleteItemFromBackend);

import ActionMenu from "./components/ActionMenu";
Vue.component('action-menu', ActionMenu);

import CreatePostForm from "./components/admin/posts/CreatePostForm";
Vue.component('admin-posts-create', CreatePostForm);

const app = new Vue({
    el: '#app'
});
