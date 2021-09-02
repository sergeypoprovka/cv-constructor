<template>
    <div>
        <div v-for="(hobbies, key) in formData[section][model]" :key="key" class="relative py-2 px-4 shadow-md rounded mb-2">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-5">
                    <el-input v-model="formData[section][model][key]['name']"></el-input>
                </div>
                <div class="col-span-5 flex flex-row items-center justify-center">
                    <el-input v-model="formData[section][model][key]['description']"></el-input>
                </div>
                <div class="col-span-2 flex flex-row items-center justify-end">
                    <span class="actions">
                        <a href="#" @click.prevent="removeSkill(key)"><i class="el-icon-delete"></i></a>
                    </span>
                </div>
            </div>
        </div>
        <div class="relative py-2 px-4 shadow-md rounded mb-2">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-4">
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Name')" v-model="hobbies.name"></el-input>
                    </el-form-item>
                </div>
                <div class="col-span-2 flex flex-row items-center justify-end">
                    <el-form-item>
                        <el-input size="small" :placeholder="$t('Description')" v-model="hobbies.description"></el-input>
                    </el-form-item>
                </div>
            </div>

            <el-button size="small" @click.prevent="addSkill" type="primary" class="w-full">{{ $t('Add hobby') }}</el-button>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    props:['section','model'],
    data(){
        return {
            hobbies:{
                name:"",
                description:""
            }
        }
    },
    computed:{
        ...mapState(['formData'])
    },
    methods:{
        removeSkill(key){
            this.formData[this.section][this.model].splice(key, 1)
        },
        addSkill(){
            this.formData[this.section][this.model].push(this.hobbies)
            this.hobbies = {
                name:"",
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
</style>
