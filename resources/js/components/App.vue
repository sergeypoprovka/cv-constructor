<template>
    <div class="grid grid-cols-2 h-full">
        <div class="grid grid-cols-6">
            <div class="col-span-2 menu-col">
                <div class="h-full py-8">
                    <ul class="flex flex-col text-center">
                        <li v-for="(tab, key) in tabs">
                            <a
                                :class="{ 'bg-blue-500 text-white' : (currentTab.slug == tab.slug) }"
                                class="flex py-4 px-8 hover:bg-blue-500 hover:text-white tab-link"
                                href="#"
                                @click.prevent="setActiveTab(tab)">
                                <i :class="tab.icon"></i> {{ tab.name }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-4 context-col">
                <component :is="currentTab.component ? currentTab.component : 'Generic'"></component>
            </div>
        </div>
        <div class="preview-col">CV viewer</div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import PersonalInfo from "./Tabs/PersonalInfo";
    import Objectives from "./Tabs/Objectives";
    import Experience from "./Tabs/Experience";
    import Education from "./Tabs/Education";
    import Generic from './Tabs/Generic';
    import SkillsTab from "./Tabs/SkillsTab";

    export default {
        components:{ Generic },
        data(){
            return {
                tabs:[
                    {'name': this.$t('Personal info'), 'slug': 'personal_info', 'icon': 'el-icon-user', component: PersonalInfo},
                    {'name': this.$t('Objective'), 'slug': 'objective', 'icon': 'el-icon-aim', component: Objectives},
                    {'name': this.$t('Skills'), 'slug': 'skills', 'icon': 'el-icon-medal', component: SkillsTab},
                    {'name': this.$t('Experience'), 'slug': 'experience', 'icon': 'el-icon-pie-chart', component: Experience},
                    {'name': this.$t('Education'), 'slug': 'education', 'icon': 'el-icon-reading', component: Education},
                    {'name': this.$t('Additional education'), 'slug': 'additional_education', 'icon': 'el-icon-notebook-1'},
                    {'name': this.$t('Languages'), 'slug': 'languages', 'icon': 'el-icon-lollipop'},
                    {'name': this.$t('Hobbies'), 'slug': 'hobbies', 'icon': 'el-icon-umbrella'}
                ]
            }
        },
        methods:{
            setActiveTab(tab){
                this.$store.commit('SET_ACTIVE_TAB', tab)
            }
        },
        computed: mapState([
            'currentTab'
        ]),
        mounted(){
            this.setActiveTab(this.tabs[0])
        }
    }
</script>

<style scoped lang="scss">
    .tab{
        &-link{
            @apply flex justify-start items-center text-left text-sm;
            i{
                @apply mr-2;
            }
        }
    }
</style>
