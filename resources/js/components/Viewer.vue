<template>
    <div class="flex flex-col justify-start items-center h-full">
        <div class="sheet" id="sheet">
            <div class="flex flex-row h-full w-full">
                <div class="deco_bar"></div>
                <div class="flex-grow">
                    <div id="personal_info" class="p-4">
                        <h1 class="text-center">{{ formData.personal_info.firstname }} {{ formData.personal_info.lastname }}</h1>
                        <el-row>
                            <el-col :span="8" class="text-left">{{ formData.personal_info.email }}</el-col>
                            <el-col :span="8" class="text-center">{{ formData.personal_info.phone }}</el-col>
                            <el-col :span="8" class="text-right">{{ formData.personal_info.portfolio }}</el-col>
                        </el-row>
                        <hr class="my-4" />
                    </div>
                    <div id="objectives" class="px-4 mb-4">
                        <h3>{{ $t('Target job summary') }}</h3>
                        <p class="mb-2">{{ formData.objective.objective }}</p>
                        <ul class="list-disc ml-4 flex flex-col" v-if="formData.objective.bullets && formData.objective.bullets.length">
                            <li class="mr-4" v-for="bullet in formData.objective.bullets">
                                {{ bullet }}
                            </li>
                        </ul>
                    </div>
                    <div id="work_experience" class="px-4">
                        <h3>{{ $t('Work experience') }}</h3>
                        <ul v-if="formData.experience.experience && formData.experience.experience.length">
                            <li class="mb-4" v-for="experience in formData.experience.experience">
                                <p class="flex flex-row justify-between">
                                    <strong>{{ experience.job_title }}</strong>
                                    <strong>{{ datify(experience.start) }} - {{ datify(experience.end) }}</strong>
                                </p>
                                <p><strong>{{ experience.company_name }}</strong></p>
                                <p>{{ experience.description }}</p>
                            </li>
                        </ul>
                    </div>
                    <div id="education" class="px-4">
                        <h3>{{ $t('Education') }}</h3>
                        <ul v-if="formData.education.education && formData.education.education.length">
                            <li class="mb-4" v-for="education in formData.education.education">
                                <p class="flex flex-row justify-between">
                                    <strong>{{ education.school_name }}</strong>
                                    <strong>{{ datify(education.start) }} - {{ datify(education.end) }}</strong>
                                </p>
                                <p><strong>{{ education.degree_course }}</strong></p>
                                <p>{{ education.description }}</p>
                            </li>
                        </ul>
                    </div>
                    <div id="additional_education" class="px-4">
                        <h3>{{ $t('Additional Education') }}</h3>
                        <ul v-if="formData.additional_education.additional_education && formData.additional_education.additional_education.length">
                            <li class="mb-4" v-for="additional_education in formData.additional_education.additional_education">
                                <p class="flex flex-row justify-between">
                                    <strong>{{ additional_education.school_name }}</strong>
                                    <strong>{{ datify(additional_education.start) }} - {{ datify(additional_education.end) }}</strong>
                                </p>
                                <p><strong>{{ additional_education.degree_course }}</strong></p>
                                <p>{{ additional_education.description }}</p>
                            </li>
                        </ul>
                    </div>
                    <div id="skills" class="px-4">
                        <h3>{{ $t('Skills') }}</h3>
                        <ul class="flex flex-row" v-if="formData.skills.skills && formData.skills.skills.length">
                            <li class="mb-4 mr-4" v-for="skill in formData.skills.skills">
                                <p>{{ skill.name }}</p>
                                <el-rate disabled v-model="skill.rating" :allow-half="true"></el-rate>
                            </li>
                        </ul>
                    </div>
                    <div id="languages" class="px-4">
                        <h3>{{ $t('Languages') }}</h3>
                        <ul class="flex flex-row" v-if="formData.language.language && formData.language.language.length">
                            <li class="mb-4 flex flex-row w-full justify-between" v-for="language in formData.language.language">
                                <p>{{ language.name }}</p>
                                <p>{{ language_levels[language.level] }}</p>
                            </li>
                        </ul>
                    </div>
                    <div id="hobbies" class="px-4">
                        <h3>{{ $t('Hobbies') }}</h3>
                        <ul class="flex flex-col" v-if="formData.hobbies.hobbies && formData.hobbies.hobbies.length">
                            <li class="mb-4 flex flex-row w-full justify-between" v-for="hobby in formData.hobbies.hobbies">
                                <p>{{ hobby.name }}</p>
                                <p>{{ hobby.description }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import moment from 'moment'

export default {
    data(){
        return {

        }
    },
    computed:{
        ...mapState(['formData','language_levels'])
    },
    methods:{
        setSheetSize(){
            let sideCoeff = 1.41
            let scale = 0.015
            let element = document.getElementById('sheet')
            let clientRect = element.getBoundingClientRect()
            let width = clientRect.width
            let desiredHeight = width * sideCoeff
            element.style.height = desiredHeight + 'px'
            element.style.fontSize = width * scale + 'px'
        },
        datify(date){
            return moment(date).format('MM-yyyy')
        }
    },
    mounted(){
        this.setSheetSize()
        window.addEventListener('resize', event => {
            this.setSheetSize()
        }, true);
    }
}
</script>

<style scoped lang="scss">
    h3{
        font-size: 2em;
        margin-bottom: 0.6em;
    }
    .sheet{
        font-size: 10px;
        width: 80%;
        background: white;
        @apply shadow-xl;
    }
    h1{
        font-size: 3em;
    }
    .deco_bar{
        @apply bg-pink-400 h-full w-4;
    }
    #skills {
        .el-rate__icon {
            font-size: 12px !important;
            margin-right: 2px;
        }
    }
</style>
