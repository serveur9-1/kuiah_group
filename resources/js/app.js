require('./bootstrap');
import store from "./store";

window.Vue = require('vue');
import VueNativeNotification from 'vue-native-notification';
Vue.use(VueNativeNotification, {
    requestOnNotify: true
})
import  router from './router'


Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router,
    store
});
