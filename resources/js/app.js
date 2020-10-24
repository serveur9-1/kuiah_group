require('./bootstrap');
import  router from './router'
import Vuex from 'vuex'

window.Vue = require('vue');
Vue.use(Vuex);

Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router
});
