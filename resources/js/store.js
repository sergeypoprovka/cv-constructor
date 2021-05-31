import Vue from 'vue'
import Vuex from "vuex";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        currentTab: 'personal_info',
        formData:{
            personal_info:{},
            objective:{},
            experience:{},
            education:{},
            skills:{}
        }
    },
    mutations: {
        SET_ACTIVE_TAB(state, payload){
            state.currentTab = payload
        }
    },
    getters:{

    },
    actions:{

    }
})

export default store
