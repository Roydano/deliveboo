/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vuetify from 'vuetify';


import App from './views/App';
import router from './router';
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init();

Vue.use(Vuetify);

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
    vuetify: new Vuetify(),
});

