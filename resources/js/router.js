import Vue from 'vue';
import Router from "vue-router";
import Dashboard from "./pages/Dashboard";

Vue.use(Router);

const routes = [
    {
        path: '/',
        component: Dashboard
    },
    {
        path: '/dashboard',
        component: Dashboard
    }
];


export default new Router({
    mode: 'history',
    routes
})
