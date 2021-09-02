<template>
    <div>
        <div v-for="(additional_education, key) in formData[section][model]" :key="key" class="relative py-2 px-4 shadow-md rounded mb-2">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('School name')" v-model="formData[section][model][key]['school_name']"></el-input>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Degree/Course')" v-model="formData[section][model][key]['degree_course']"></el-input>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-date-picker size="small" v-model="formData[section][model][key]['start']" type="month" :placeholder="$t('Start date')"></el-date-picker>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-date-picker size="small" v-model="formData[section][model][key]['end']" type="month" :placeholder="$t('End date')"></el-date-picker>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-input size="small" type="textarea" :placeholder="$t('Description')" v-model="formData[section][model][key]['description']"></el-input>
                    </el-form-item>
                </div>
            </div>
        </div>
        <div class="relative py-2 px-4 shadow-md rounded mb-2">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('School name')" v-model="additional_education.school_name"></el-input>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Degree/Course')" v-model="additional_education.degree_course"></el-input>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-date-picker size="small" v-model="additional_education.start" type="month" :placeholder="$t('Start date')"></el-date-picker>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-date-picker size="small" v-model="additional_education.end" type="month" :placeholder="$t('End date')"></el-date-picker>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-input size="small" type="textarea" :placeholder="$t('Description')" v-model="additional_education.description"></el-input>
                    </el-form-item>
                </div>
            </div>

            <el-button size="small" @click.prevent="addExperience" type="primary" class="w-full">{{ $t('Add additional education') }}</el-button>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    props:['section','model'],
    data(){
        return {
            additional_education:{
                school_name:"",
                degree_course:"",
                start:"",
                end:"",
                description:""
            }
        }
    },
    computed:{
        ...mapState(['formData'])
    },
    methods:{
        removeExperience(key){
            this.formData[this.section][this.model].splice(key, 1)
        },
        addExperience(){
            this.formData[this.section][this.model].push(this.additional_education)
            this.additional_education = {
                school_name:"",
                degree_course:"",
                start:"",
                end:"",
                description:""
            }
        }
    }
}
</script>

<style scoped>
    .el-form-item{
        margin-bottom:0.3em;
    }
    .el-button{
        margin-bottom:1em;
    }
    .el-date-editor, .el-select{
        @apply w-full;
    }
</style>
