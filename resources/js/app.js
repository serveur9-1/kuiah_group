/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';


Vue.use(VueRouter);


import Home from './components/HomeComponent.vue';
import Listpublication from './components/publication/ListpublicationComponent.vue';


const routes = [
    {
        path:'/',
        component: Home
    },
    {
        path:'/home',
        component: Home
    },
    {
        path:'/listpublication',
        component: Listpublication
    }
];

const router = new VueRouter({ routes });

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router: router
});
