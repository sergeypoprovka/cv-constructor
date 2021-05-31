<template>
    <div class="grid grid-cols-2 h-full">
        <div class="grid grid-cols-6">
            <div class="col-span-2 menu-col">
                <div class="h-full py-8">
                    <ul class="flex flex-col text-center">
                        <li><a :class="{ 'bg-blue-500 text-white' : (currentTab == 'personal_info') }" @click.prevent="setActiveTab('personal_info')" class="flex py-4 px-8 hover:bg-blue-500 hover:text-white" href="#">{{ $t('Personal info') }}</a></li>
                        <li><a :class="{ 'bg-blue-500 text-white' : (currentTab == 'objective') }" @click.prevent="setActiveTab('objective')" class="flex py-4 px-8 hover:bg-blue-500 hover:text-white" href="#">{{ $t('Objective') }}</a></li>
                        <li><a :class="{ 'bg-blue-500 text-white' : (currentTab == 'experience') }" @click.prevent="setActiveTab('experience')" class="flex py-4 px-8 hover:bg-blue-500 hover:text-white" href="#">{{ $t('Experience') }}</a></li>
                        <li><a :class="{ 'bg-blue-500 text-white' : (currentTab == 'education') }" @click.prevent="setActiveTab('education')" class="flex py-4 px-8 hover:bg-blue-500 hover:text-white" href="#">{{ $t('Education') }}</a></li>
                        <li><a :class="{ 'bg-blue-500 text-white' : (currentTab == 'skills') }" @click.prevent="setActiveTab('skills')" class="flex py-4 px-8 hover:bg-blue-500 hover:text-white" href="#">Skills</a></li>
                        <li><a :class="{ 'bg-blue-500 text-white' : (currentTab == 'interests') }" @click.prevent="setActiveTab('interests')" class="flex py-4 px-8 hover:bg-blue-500 hover:text-white" href="#">Interests</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-span-4 context-col">
                <personal-info v-if="currentTab == 'personal_info'"></personal-info>
                <objectives v-if="currentTab == 'objective'"></objectives>
                <experience v-if="currentTab == 'experience'"></experience>
                <education v-if="currentTab == 'education'"></education>
            </div>
        </div>
        <div class="preview-col">CV viewer</div>
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        data(){
            return {

            }
        },
        methods:{
            setActiveTab(slug){
                this.$store.commit('SET_ACTIVE_TAB', slug)
            }
        },
        computed: mapState([
            'currentTab'
        ])
    }
</script>
