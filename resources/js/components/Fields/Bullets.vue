<template>
    <div>
        <div v-for="(bullet, key) in formData[section][model]" :key="key" class="relative py-2 px-4 shadow-md rounded mb-2">
            <span class="actions">
                <a href="#" @click.prevent="removeBullet(key)"><i class="el-icon-delete"></i></a>
            </span>
            <el-form-item :label="bulletName(key)">
                <el-input v-model="formData[section][model][key]"></el-input>
            </el-form-item>
        </div>
        <div class="relative py-2 px-4 shadow-md rounded mb-2">
            <el-form-item :label="$t('Add bullet')">
                <el-input v-model="new_bullet"></el-input>
            </el-form-item>
            <el-button size="small" @click.prevent="addBullet" type="primary" class="w-full">{{ $t('Add bullet') }}</el-button>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    props:['section','model'],
    data(){
        return {
            new_bullet:""
        }
    },
    computed:{
        ...mapState(['formData'])
    },
    methods:{
        removeBullet(key){
            this.formData[this.section][this.model].splice(key, 1)
        },
        bulletName(key){
            return this.$t('Bullet') + ' ' + key
        },
        addBullet(){
            this.formData[this.section][this.model].push(this.new_bullet)
            this.new_bullet = ""
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
