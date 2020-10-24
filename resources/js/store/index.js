import Vue from 'vue'
import Vuex from 'vuex'
import country from "./modules/country";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        country,
    },
    strict: debug,
})
