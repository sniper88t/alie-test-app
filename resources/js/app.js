

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue/dist/vue'

require('./bootstrap');
window.Vue = require('vue');


import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';


Vue.use(VueRouter);
Vue.use(VueAxios, axios);
 
const router = new VueRouter({
    mode: 'history',
    routes: routes
});


Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);
Vue.component('home-component', require('./App.vue').default);

Vue.config.productionTip = false



const app = new Vue({
    router: router,
    el: '#app',
});


