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



import App from './views/App';
import router from './router';
import Vue from 'vue';
import vmodal from 'vue-js-modal';
import PortalVue from 'portal-vue';
import vClickOutside from "click-outside-vue3";
import Popover from 'vue-js-popover'
 


/* import ScrollReveal from 'scrollreveal';
    
Vue.use(ScrollReveal); */
Vue.use(vmodal);
Vue.use(vClickOutside);
Vue.use(Popover);
Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
      el.clickOutsideEvent = function (event) {
        // here I check that click was outside the el and his children
        if (!(el == event.target || el.contains(event.target))) {
          // and if it did, call method provided in attribute value
          vnode.context[binding.expression](event);
        }
      };
      document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
      document.body.removeEventListener('click', el.clickOutsideEvent)
    },
  });

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
    store: new Vuex.Store(store)
});

