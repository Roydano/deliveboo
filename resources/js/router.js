import Vue from 'vue'; 
import Vuex from 'vuex';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Cuisine from './pages/Cuisine';
import Cuisines from './pages/Cuisines';
import Cart from './pages/Cart';
import Restaurants from './pages/Restaurants';
import Restaurant from './pages/Restaurant';
import MenuCourse from './pages/MenuCourse';

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
        },
        {
            path: '/restaurants',
            name: 'restaurants', 
            component: Restaurants
        },
        {
            path: '/restaurants/:slug',
            name: 'restaurant', 
            component: Restaurant
        },
        {
            path: '/restaurants/:slug/:slugCourse',
            name: 'showMenu', 
            component: MenuCourse
        }
        

    ]
});

export default router;