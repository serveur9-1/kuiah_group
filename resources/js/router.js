import Vue from 'vue';
import Router from "vue-router";
import Dashboard from "./pages/Dashboard";
import UserAccount from "./pages/UserAccount";
import NotFound from "./pages/NotFound";
import ListPublication from "./pages/publication/ListPublication";
import Waitpublication from "./pages/publication/Waitpublication";
import ViewPublication from "./pages/publication/ViewPublication";
import NewPublication from "./pages/publication/NewPublication";
import ListInvestor from "./pages/investor/ListInvestor";
import DetailInvestor from "./pages/investor/DetailInvestor";
import ListEntrepreneur from "./pages/entrepreneur/ListEntrepreneur";
import AskAccount from "./pages/account/AskAccount";
import ListIndustry from "./pages/industry/ListIndustry";
import AddIndustry from "./pages/industry/AddIndustry";
import ListDomain from "./pages/Domain/ListDomain";
import AddDomain from "./pages/Domain/AddDomain";
import ListCountry from "./pages/country/ListCountry";
import AddCountry from "./pages/country/AddCountry";
import ListLevel from "./pages/level/ListLevel";
import AddLevel from "./pages/level/AddLevel";
import ListPartner from "./pages/partner/ListPartner";
import AddPartner from "./pages/partner/AddPartner";
import ListRealstates from "./pages/realstates/ListRealstates";




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
        path: '/publication/View',
        component : ViewPublication
    },
    {
        path: '/publication/waiting/View',
        component : NewPublication
    },
    {
        path: '/investor/list',
        component : ListInvestor
    },
    {
        path: '/investor/View',
        component : DetailInvestor
    },
    {
        path: '/entrepreneur/list',
        component : ListEntrepreneur
    },
    {
        path: '/account/ask',
        component : AskAccount
    },
    {
        path: '/industry/list',
        component : ListIndustry
    },
    {
        path: '/industry/add',
        component : AddIndustry
    },
    {
        path: '/domain/list',
        component : ListDomain
    },
    {
        path: '/domain/add',
        component : AddDomain
    },
    {
        path: '/country/list',
        component : ListCountry
    },
    {
        path: '/country/add',
        component : AddCountry
    },
    {
        path: '/level/list',
        component : ListLevel
    },
    {
        path: '/level/add',
        component : AddLevel
    },
    {
        path: '/partner/list',
        component : ListPartner
    },
    {
        path: '/partner/add',
        component : AddPartner
    },
    {
        path: '/realstates/list',
        component : ListRealstates
    },
];


export default new Router({
    mode: 'history',
    routes
})
