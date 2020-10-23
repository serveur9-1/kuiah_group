import Vue from 'vue';
import Router from "vue-router";
import Dashboard from "./pages/Dashboard";
import UserAccount from "./pages/UserAccount";
import NotFound from "./pages/NotFound";
import ListPublication from "./pages/publication/ListPublication";
import Waitpublication from "./pages/publication/Waitpublication";
import ListInvestor from "./pages/investor/ListInvestor";
import ListEntrepreneur from "./pages/entrepreneur/ListEntrepreneur";



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
    },
    {
        path: '/publication/list',
        component : ListPublication
    },
    {
        path: '/publication/waiting',
        component : Waitpublication
    },
    {
        path: '/investor/list',
        component : ListInvestor
    },
    {
        path: '/entrepreneur/list',
        component : ListEntrepreneur
    },
];


export default new Router({
    mode: 'history',
    routes
})
