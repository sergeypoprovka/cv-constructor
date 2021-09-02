<template>
    <div>
        <div class="relative py-2 px-4 shadow-md rounded mb-2" v-if="fieldType == 'text' || fieldType == 'textarea'">
            <span class="actions">
                <a v-if="removable" href="#" @click.prevent="removeBlock"><i class="el-icon-delete"></i></a>
            </span>
            <el-form-item :label="label">
                <el-input v-model="formData[section][model]" :type="fieldType" :placeholder="placeholder"></el-input>
            </el-form-item>
        </div>
        <div v-if="type == 'bullets'">
            <bullets :section="section" :model="model"></bullets>
        </div>
        <div v-if="type == 'skills'">
            <skills :section="section" :model="model"></skills>
        </div>
        <div v-if="type == 'experience'">
            <exp-items :section="section" :model="model"></exp-items>
        </div>
        <div v-if="type == 'education'">
            <edu-items :section="section" :model="model"></edu-items>
        </div>
        <div v-if="type == 'additional_education'">
            <add-edu-items :section="section" :model="model"></add-edu-items>
        </div>
        <div v-if="type == 'language'">
            <languages :section="section" :model="model"></languages>
        </div>
        <div v-if="type == 'hobbies'">
            <hobbies :section="section" :model="model"></hobbies>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import EventBus from "../../eventBus";
export default {
    props:['label','placeholder','type','removable','model','section'],
    methods:{
        removeBlock(){
            EventBus.$emit('remove-field',{section : this.section, model : this.model})
            delete this.formData[this.section][this.model]
        }
    },
    computed:{
        ...mapState(['formData']),
        fieldType(){
            if(this.type){
                return this.type
            }
            return "text"
        }
    }
}
</script>

<style scoped lang="scss">

</style>
