<template>
    <div class="relative py-2 px-4 shadow-md rounded mb-2">
        <el-form label-position="top">
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <el-form-item :label="$t('Label')">
                        <el-input size="small" v-model="form.label"></el-input>
                    </el-form-item>
                </div>
                <div>
                    <el-form-item :label="$t('Text')">
                        <el-input size="small" v-model="form.value"></el-input>
                    </el-form-item>
                </div>
            </div>
            <el-button size="small" @click.prevent="addField" type="primary" class="w-full">{{ $t('Add field') }}</el-button>
        </el-form>
    </div>
</template>

<script>
import EventBus from "../../eventBus";

export default {
    props:['section'],
    data(){
        return {
            field_id:"",
            form:{
                label:"",
                value:""
            }
        }
    },
    computed:{
        field_name(){
            return this.slugify(this.form.label) + "_" + this.field_id
        }
    },
    methods:{
        addField(){
            EventBus.$emit('add-field', { id: this.field_name, form: this.form, section: this.section })
            this.renewFormData()
        },
        renewFormData(){
            this.form = {
                label:"",
                value:""
            }
            this.field_id = this.makeid(16)
        },
        makeid(length) {
            let result = [];
            let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let charactersLength = characters.length;
            for ( let i = 0; i < length; i++ ) {
                result.push(characters.charAt(Math.floor(Math.random() * charactersLength)));
            }
            return result.join('');
        },
        slugify(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            let from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            let to   = "aaaaeeeeiiiioooouuuunc______";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    },
    mounted(){
        this.field_id = this.makeid(16)
    }
}
</script>

<style scoped>
 .el-form-item{
     margin-bottom:0;
 }
 .el-button{
     margin-bottom:1em;
 }
</style>
