import { createStore } from "vuex"

export function getCurrentNode(categories, itemId) {
    if (!categories || categories.length === 0) return null;

    for (const node of categories) {
        if (node.id === itemId) {
            return node;
        }

        if (node.children && node.children.length > 0) {
            const found = getCurrentNode(node.children, itemId);
            if (found) return found;
        }
    }
}

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
        currentNode: state => getCurrentNode(state.categories, state.openItem)
    }
})
