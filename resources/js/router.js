import Vue from 'vue'; 
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import Cuisine from './pages/Cuisine';
import Cuisines from './pages/Cuisines';
import Restaurants from './pages/Restaurants';
import Restaurant from './pages/Restaurant';

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
            component: Restaurant
        }
        

    ]
});

export default router;