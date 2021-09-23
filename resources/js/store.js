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
        language_levels:{
            beginner:"Beginner/Elementary",
            pre_intermediate:"Pre intermediate",
            intermediate:"Intermediate",
            upper_intermediate:"Upper intermediate",
            advanced:"Advanced",
            proficient:"Proficient",
        },
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
        },
        DOWNLOAD_CV(state, payload){
            axios.post('/api/download', this.state.formData).then( res => {

            }).catch( err => {

            })
        }
    },
    getters:{

    },
    actions:{

    },
})

export default store
