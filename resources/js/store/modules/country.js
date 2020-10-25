import { types } from './../types'

const state = () => ({
    items: [
        {id:null, name: 'Mali'},
        {id:null, name: 'Congo'},
    ],
    requestStatus: null
})

const getters = {

}

const actions = {
    [types.GET_COUNTRIES]({ commit, state }) {

        commit("setRequestStatus", "loading")

        console.log("Action mutation !!!");
        commit("getCountries", {
            id: 1,
            name: "Burkina Faso"
        })

        commit("setRequestStatus", "success")
    },
}

const mutations = {
    setRequestStatus (state, status) {
        state.requestStatus = status
    },
    getCountries (state, payload) {
        state.items.push(payload)
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
