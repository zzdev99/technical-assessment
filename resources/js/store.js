import { createStore } from "vuex"

export default createStore({
    state: {
        loading: null,
        categories: [],
        openItem: null,
    },
    mutations: {
        SET_LOADING(state, payload) {
            state.isLoading = payload
        },
        SET_CATEGORIES(state, payload) {
            state.categories = payload
        },
        SET_OPEN_ITEM(state, payload) {
            state.openItem = payload
        }
    },
    actions: {
        setLoading({ commit }, payload) {
            commit('SET_LOADING', payload)
        },
        setCategories({ commit }, payload) {
            commit('SET_CATEGORIES', payload)
        },
        setOpenItem({ commit }, payload) {
            commit('SET_OPEN_ITEM', payload)
        }
    },
    getters: {
        getCategories: state => state.categories,
        getOpenItem: state => state.openItem,
        isLoading: state => state.isLoading,
    }
})
