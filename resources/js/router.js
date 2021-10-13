import Vue from 'vue'; 
import Vuex from 'vuex';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Cuisine from './pages/Cuisine';
import Cuisines from './pages/Cuisines';
import CartPage from './pages/CartPage';
import Checkout from './pages/Checkout';
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
            path: '/restaurants',
            name: 'restaurants', 
            component: Restaurants
        },
        {
            path: '/restaurants/:slug',
            name: 'restaurant', 
            component: Restaurant,
            children: [
                {
                    path: ':slugCourse',
                    name: 'showMenu',
                    component: MenuCourse
                }
            ]
        },
        {
            path: '/cart-page',

            name: 'cart.page',

            component: CartPage,

        },
        {

            path: '/checkout',

            name: 'checkout',

            component: Checkout,

        }
        

    ]
});

export default router;