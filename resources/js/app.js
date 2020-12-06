require('./bootstrap');
import store from "./store";
import VeeValidate from 'vee-validate';
import Vuex from 'vuex';
import { router } from './router';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import DataTable from 'laravel-vue-datatable';
import axios from "axios";




window.Vue = require('vue');
import VueNativeNotification from 'vue-native-notification';
Vue.use(VueNativeNotification, {
    requestOnNotify: true
})

Vue.use(VueToast);

Vue.use(VeeValidate);
Vue.use(Vuex);
Vue.use(DataTable);

axios.interceptors.response.use(undefined, function (error) {
    if (error) {
      const originalRequest = error.config;
      if (error.response.status === 401 && !originalRequest._retry) {

          originalRequest._retry = true;
          store.dispatch('auth/logout')
          return router.push('/login')
      }
    }
  });



Vue.component('wrapper-component', require('./components/WrapperComponent.vue').default);

const app = new Vue({
    el: '#app-vue',
    router,
    store,
});
