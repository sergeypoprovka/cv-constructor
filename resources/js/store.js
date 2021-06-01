import Vue from 'vue'
import Vuex from "vuex";

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        currentTab: 'personal_info',
        formData:{
            personal_info:{},
            objective:{
                bullets:["","",""]
            },
            experience:{},
            education:{},
            skills:{
                skills:[]
            }
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
