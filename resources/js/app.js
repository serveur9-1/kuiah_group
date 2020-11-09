require('./bootstrap');
import store from "./store";
import VeeValidate from 'vee-validate';
import Vuex from 'vuex';
import { router } from './router';


window.Vue = require('vue');
import VueNativeNotification from 'vue-native-notification';
Vue.use(VueNativeNotification, {
    requestOnNotify: true
})

Vue.use(VeeValidate);
Vue.use(Vuex);



Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router,
    store,

});
