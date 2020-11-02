require('./bootstrap');
import store from "./store";

window.Vue = require('vue');
import VueNativeNotification from 'vue-native-notification';
Vue.use(VueNativeNotification, {
    requestOnNotify: true
})
import  router from './router'

//Import v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router,
    store
});
