/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VModal from 'vue-js-modal';
import Notifications from 'vue-notification';
import store from './store/store.js';
import Loading from 'vue-loading-overlay';

Vue.use(Notifications);
Vue.use(VModal);

Vue.component('v-app', require('./App.vue').default);

Vue.component('v-header', require('./components/Header.vue').default);
Vue.component('v-body', require('./components/Body.vue').default);
Vue.component('v-footer', require('./components/Footer.vue').default);

Vue.component('v-card', require('./components/common/Card.vue').default);
Vue.component('v-quote-creation-form', require('./components/common/QuoteCreationForm.vue').default);
Vue.component('v-button', require('./components/common/Button.vue').default);
Vue.component('loading', Loading);

// Ajax loading state
axios.interceptors.request.use(function (config) {
    store.commit("loading", true);
    return config;
}, function (error) {
    return Promise.reject(error);
});

axios.interceptors.response.use(function (config) {
    store.commit("loading", false);
    return config;
}, function (error) {
    store.commit("loading", false);
    return Promise.reject(error);
});

// Create Vue
const app = new Vue({
    'el': '#app',
    store
});
