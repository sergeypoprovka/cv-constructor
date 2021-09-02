import Vue from 'vue'
import Vuex from "vuex";
import VuexPersistence from 'vuex-persist'

Vue.use(Vuex)


const vuexLocal = new VuexPersistence({
    key: "cv",
    storage: window.localStorage
})

const store = new Vuex.Store({
    plugins:[vuexLocal.plugin],
    state: {
        currentTab: 'personal_info',
        formData:{
            personal_info:{},
            objective:{
                bullets:["","",""]
            },
            experience:{
                experience:[]
            },
            education:{
                education:[]
            },
            additional_education:{
                additional_education:[]
            },
            skills:{
                skills:[]
            },
            language:{
                language:[]
            },
            hobbies:{
                hobbies:[]
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

    },
})

export default store
