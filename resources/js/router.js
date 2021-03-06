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
import Login from "./pages/auth/Login";
import ListNotification from "./pages/notification/ListNotification";
import ListTestimonial from "./pages/testimonial/ListTestimonial";
import AddTestimonial from "./pages/testimonial/AddTestimonial";
import forgetPassword from "./pages/auth/ForgetPassword.vue";

Vue.use(Router);

export const router = new Router({
  mode: 'history',
  routes: [
    {
        path: '*',
        component: NotFound
    },
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/account',
        name: 'account',
        component: UserAccount
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/forget_password',
        name: 'forget',
        component: forgetPassword
    },
    {
        path: '/publication/list',
        name: 'listPublication',
        component : ListPublication
    },
    {
        path: '/publication/waiting',
        name: 'waitPublication',
        component : Waitpublication
    },
    {
        path: '/publication/View:id',
        name: 'viewPublication',
        component : ViewPublication
    },
    {
        path: '/publication/waiting/View/:id',
        name: 'newPublication',
        component : NewPublication
    },
    {
        path: '/investor/list',
        name: 'listInvestor',
        component : ListInvestor
    },
    {
        path: '/investor/View/:id',
        name: 'investorView',
        component : DetailInvestor
    },
    {
        path: '/entrepreneur/list',
        name: 'listEntrepreneur',
        component : ListEntrepreneur
    },
    {
        path: '/entrepreneur/View/:id',
        name: 'entrepreneurView',
        component : DetailEntrepreneur
    },
    {
        path: '/account/ask',
        name: 'askAccount',
        component : AskAccount
    },
    {
        path: '/industry/list',
        name : 'listIndustries',
        component : ListIndustry
    },
    {
        path: '/industry/add',
        name: 'addIndustry',
        component : AddIndustry
    },
    {
        path: '/industry/edit/:id',
        name: 'editIndustry',
        component : EditIndustry
    },
    {
        path: '/domain/list/:id',
        name: 'listDomain',
        component : ListDomain
    },
    {
        path: '/domain/add/:id',
        name: 'addDomain',
        component : AddDomain
    },
    {
        path: '/domain/edit/:id',
        name: 'editDomain',
        component : EditDomain
    },
    {
        path: '/country/list',
        name : 'listCountry',
        component : ListCountry
    },
    {
        path: '/country/add',
        name : 'addCountry',
        component : AddCountry
    },
    {
        path: '/country/edit/:id',
        name : 'editCountry',
        component : EditCountry
    },
    {
        path: '/level/list',
        name: 'listLevel',
        component : ListLevel
    },
    {
        path: '/level/add',
        name: 'addLevel',
        component : AddLevel
    },
    {
        path: '/level/edit/:id',
        name: 'editLevel',
        component : EditLevel
    },
    {
        path: '/partner/list',
        name: 'listPartner',
        component : ListPartner
    },
    {
        path: '/partner/add',
        name: 'addPartner',
        component : AddPartner
    },
    {
        path: '/partner/edit/:id',
        name: 'editPartner',
        component : EditPartner
    },
    {
        path: '/realstates/list',
        name: 'listRealstates',
        component : ListRealstates
    },
    {
        path: '/realstates/waiting',
        component : WaitRealstates
    },
    {
        path: '/realstates/View/:id',
        name: 'viewRealstates',
        component : DetailRealstates
    },
    {
        path: '/realstates/waiting/View/:id',
        name: 'newRealstates',
        component : NewRealstates
    },
    {
        path: '/notification/list',
        name: 'listNotification',
        component : ListNotification
    },
    {
        path: '/testimonial/list',
        component : ListTestimonial
    },
    {
        path: '/testimonial/add',
        component : AddTestimonial
    },
  ]
});

router.beforeEach((to, from, next) => {
  const publicPages = ['/login','/forget_password'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = localStorage.getItem('user');

  // trying to access a restricted page + not logged in
  // redirect to login page
  if (authRequired && !loggedIn) {
    next('/login');
  } else {
    next();
  }
});
