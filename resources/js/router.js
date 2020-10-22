import Vue from 'vue';
import Router from "vue-router";
import Dashboard from "./pages/Dashboard";
import UserAccount from "./pages/UserAccount";
import NotFound from "./pages/NotFound";

Vue.use(Router);

const routes = [
    {
        path: '*',
        component: NotFound
    },
    {
        path: '/',
        component: Dashboard
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: '/account',
        component: UserAccount
    }
];


export default new Router({
    mode: 'history',
    routes
})
