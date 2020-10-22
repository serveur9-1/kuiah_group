require('./bootstrap');
import  router from './router'
window.Vue = require('vue');

Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router
});
