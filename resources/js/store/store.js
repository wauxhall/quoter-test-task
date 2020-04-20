import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        quotes: [],
        loading: false
    },

    getters: {
        // Here we will create a getter
    },

    mutations: {
        pushOne(state, data) {
            state.quotes.push(data);
        },
        pushMany(state, data) {
            state.quotes.push(...data);
        },
        unshiftOne(state, data) {
            state.quotes.unshift(data);
        },
        loading(state, isLoading) {
            state.loading = isLoading;
        }
    },

    actions: {
        pushOne(context, data) {
            context.commit('pushOne', data);
        },
        pushMany(context, data) {
            context.commit('pushMany', data);
        },
        unshiftOne(context, data) {
            context.commit('unshiftOne', data);
        }
    }
});
