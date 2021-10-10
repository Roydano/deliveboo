import Vue from 'vue'; 
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Cuisine from './pages/Cuisine';
import Cuisines from './pages/Cuisines';
import Cart from './pages/Cart';

const router = new VueRouter({
    mode: 'history', 
    routes: [ 
        {
            path: '/',
            name: 'home', 
            component: Home
        },
        {
            path: '/cuisines',
            name: 'cuisines', 
            component: Cuisines
        },
        {
            path: '/cuisines/:slug',
            name: 'cuisine', 
            component: Cuisine
        },
        {
            path: '/cart',
            name: 'cart', 
            component: Cart
        }

    ]
});

export default router;