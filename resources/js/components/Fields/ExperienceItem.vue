<template>
    <div>
        <div v-for="(experience, key) in formData[section][model]" :key="key" class="relative py-2 px-4 shadow-md rounded mb-2">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <el-form-item>
                        <el-select size="small" v-model="formData[section][model][key]['type']" :placeholder="$t('Select type')">
                            <el-option
                                v-for="(item, key) in types"
                                :key="key"
                                :label="item"
                                :value="key">
                            </el-option>
                        </el-select>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Company name')" v-model="formData[section][model][key]['company_name']"></el-input>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Job title')" v-model="formData[section][model][key]['job_title']"></el-input>
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
<!--            <div class="grid grid-cols-2 gap-4">-->
<!--                <div>-->
<!--                    <el-input v-model="formData[section][model][key]['name']"></el-input>-->
<!--                </div>-->
<!--                <div>-->

<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="relative py-2 px-4 shadow-md rounded mb-2">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <el-form-item>
                        <el-select size="small" v-model="experience.type" :placeholder="$t('Select type')">
                            <el-option
                                v-for="(item, key) in types"
                                :key="key"
                                :label="item"
                                :value="key">
                            </el-option>
                        </el-select>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Company name')" v-model="experience.company_name"></el-input>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Job title')" v-model="experience.job_title"></el-input>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-date-picker size="small" v-model="experience.start" type="month" :placeholder="$t('Start date')"></el-date-picker>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-date-picker size="small" v-model="experience.end" type="month" :placeholder="$t('End date')"></el-date-picker>
                    </el-form-item>
                </div>
                <div class="col-span-2">
                    <el-form-item>
                        <el-input size="small" type="textarea" :placeholder="$t('Description')" v-model="experience.description"></el-input>
                    </el-form-item>
                </div>
            </div>

            <el-button size="small" @click.prevent="addExperience" type="primary" class="w-full">{{ $t('Add experience') }}</el-button>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    props:['section','model'],
    data(){
        return {
            types:{"work":'Work experience', "volunteering":'Volunteering experience',"internship":'Internship'},
            experience:{
                type:"work",
                company_name:"",
                job_title:"",
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
            this.formData[this.section][this.model].push(this.experience)
            this.experience = {
                type:"work",
                company_name:"",
                job_title:"",
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
