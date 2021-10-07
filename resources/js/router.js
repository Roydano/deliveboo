import Vue from 'vue'; 
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Cuisine from './pages/Cuisine';

const router = new VueRouter({
    mode: 'history', 
    routes: [ 
        {
        path: '/',
        name: 'home', 
        component: Home
        },
        {
        path: '/home/:slug',
        name: 'cuisine',
        component: Cuisine
        }
    ]
});

export default router;