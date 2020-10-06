require('./bootstrap');
require('./buefy');
require('./event-bus');

window.axios.interceptors.response.use(
    function(response) {
        return response;
    },
    function(error) {
        eventBus.$emit('danger-notification-message', 'An error occurred while processing your request');
        return Promise.reject(error.response); // transform response.response -> response
    }
);

Vue.mixin(require('./mixins/trans'));

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

const app = new Vue({
    el: '#app'
});
