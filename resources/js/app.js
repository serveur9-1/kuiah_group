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
import Ajoutcategorie from './components/categorie/AjoutcategorieComponent.vue';
import Listcategorie from './components/categorie/ListcategorieComponent.vue';
import Editcategorie from './components/categorie/EditcategorieComponent.vue';
import Demandeclient from './components/client/DemandeclientComponent.vue';
import Listclient from './components/client/ListclientComponent.vue';
import Ajoutentrepreneur from './components/entrepreneur/AjoutentrepreneurComponent.vue';
import Listentrepreneur from './components/entrepreneur/ListentrepreneurComponent.vue';
import Editentrepreneur from './components/entrepreneur/EditentrepreneurComponent.vue';
import Listgestionnaire from './components/gestionnaire/ListgestionnaireComponent.vue';
import Ajoutgestionnaire from './components/gestionnaire/AjoutgestionnaireComponent.vue';
import Ajoutinvestisseur from './components/investisseur/AjoutinvestisseurComponent.vue';
import Listinvestisseur from './components/investisseur/ListinvestisseurComponent.vue';
import Editinvestisseur from './components/investisseur/EditinvestisseurComponent.vue';
import Listpartenaire from './components/partenaire/ListpartenaireComponent.vue';
import Ajoutpartenaire from './components/partenaire/AjoutpartenaireComponent.vue';
import Editpartenaire from './components/partenaire/EditpartenaireComponent.vue';
import Listpays from './components/pays/ListpaysComponent.vue';
import Ajoutpays from './components/pays/AjoutpaysComponent.vue';
import Editpays from './components/pays/EditpaysComponent.vue';
import Listniveau from './components/projet/ListniveauComponent.vue';
import Ajoutniveau from './components/projet/AjoutniveauComponent.vue';
import Ajoutpublication from './components/publication/AjoutpublicationComponent.vue';
import Listpublication from './components/publication/ListpublicationComponent.vue';
import Confirmpublication from './components/publication/ConfirmpublicationComponent.vue';
import Editpublication from './components/publication/EditpublicationComponent.vue';
import Task from './components/TaskComponent.vue';

const routes = [
    {
        path:'/home',
        component: Home
    },
    {
        path:'/ajoutcategorie',
        component: Ajoutcategorie
    },
    {
        path:'/listcategorie',
        component: Listcategorie
    },
    {
        path:'/editcategorie',
        component: Editcategorie
    },
    {
        path:'/demandeclient',
        component: Demandeclient
    },
    {
        path:'/listclient',
        component: Listclient
    },
    {
        path:'/ajoutentrepreneur',
        component: Ajoutentrepreneur
    },
    {
        path:'/listentrepreneur',
        component: Listentrepreneur
    },
    {
        path:'/editentrepreneur',
        component: Editentrepreneur
    },
    {
        path:'/ajoutgestionnaire',
        component: Ajoutgestionnaire
    },
    {
        path:'/listgestionnaire',
        component: Listgestionnaire
    },
    {
        path:'/ajoutinvestisseur',
        component: Ajoutinvestisseur
    },
    {
        path:'/listinvestisseur',
        component: Listinvestisseur
    },
    {
        path:'/editinvestisseur',
        component: Editinvestisseur
    },
    {
        path:'/ajoutpartenaire',
        component: Ajoutpartenaire
    },
    {
        path:'/listpartenaire',
        component: Listpartenaire
    },
    {
        path:'/editpartenaire',
        component: Editpartenaire
    },
    {
        path:'/ajoutpays',
        component: Ajoutpays
    },
    {
        path:'/listpays',
        component: Listpays
    },
    {
        path:'/Editpays',
        component: Editpays
    },
    {
        path:'/listniveau',
        component: Listniveau
    },
    {
        path:'/ajoutniveau',
        component: Ajoutniveau
    },
    {
        path:'/ajoutpublication',
        component: Ajoutpublication
    },
    {
        path:'/listpublication',
        component: Listpublication
    },
    {
        path:'/Confirmpublication',
        component: Confirmpublication
    },
    {
        path:'/editpublication',
        component: Editpublication
    },
    {
        path: '/task',
        component: Task
    }
];

const router = new VueRouter({ routes });

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router: router
});
