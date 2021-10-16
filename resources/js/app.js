/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import App from './views/App';
import store from './store.js';
import router from './router';

require('./bootstrap');

require('@fortawesome/fontawesome-free/js/all.js');

require('./store');

window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
    store: new Vuex.Store(store)
});

