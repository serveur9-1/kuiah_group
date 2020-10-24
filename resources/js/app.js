require('./bootstrap');
import {store} from "./store";

window.Vue = require('vue');
import  router from './router'


Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router,
    store
});
