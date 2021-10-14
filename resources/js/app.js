/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');
window.axios = require('axios');
window.VueScrollReveal = require('vue-scroll-reveal');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(VueScrollReveal);

import App from './views/App';
import router from './router';
import Vue from 'vue';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
});

