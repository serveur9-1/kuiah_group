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
import DetailEntrepreneur from "./pages/entrepreneur/DetailEntrepreneur";
import AskAccount from "./pages/account/AskAccount";
import ListIndustry from "./pages/industry/ListIndustry";
import AddIndustry from "./pages/industry/AddIndustry";
import EditIndustry from "./pages/industry/EditIndustry";
import ListDomain from "./pages/Domain/ListDomain";
import AddDomain from "./pages/Domain/AddDomain";
import ListCountry from "./pages/country/ListCountry";
import AddCountry from "./pages/country/AddCountry";
import EditCountry from "./pages/country/EditCountry";
import ListLevel from "./pages/level/ListLevel";
import AddLevel from "./pages/level/AddLevel";
import EditLevel from "./pages/level/EditLevel";
import ListPartner from "./pages/partner/ListPartner";
import AddPartner from "./pages/partner/AddPartner";
import EditPartner from "./pages/partner/EditPartner";
import ListRealstates from "./pages/realstates/ListRealstates";
import WaitRealstates from "./pages/realstates/WaitRealstates";
import DetailRealstates from "./pages/realstates/DetailRealstates";
import NewRealstates from "./pages/realstates/NewRealstates";
import EditDomain from "./pages/Domain/EditDomain";





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
        path: '/entrepreneur/View',
        component : DetailEntrepreneur
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
        path: '/industry/edit',
        component : EditIndustry
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
        path: '/domain/edit',
        component : EditDomain
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
        path: '/country/edit',
        component : EditCountry
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
        path: '/level/edit',
        component : EditLevel
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
        path: '/partner/edit',
        component : EditPartner
    },
    {
        path: '/realstates/list',
        component : ListRealstates
    },
    {
        path: '/realstates/waiting',
        component : WaitRealstates
    },
    {
        path: '/realstates/View',
        component : DetailRealstates
    },
    {
        path: '/realstates/waiting/View',
        component : NewRealstates
    },
];


export default new Router({
    mode: 'history',
    routes
})
