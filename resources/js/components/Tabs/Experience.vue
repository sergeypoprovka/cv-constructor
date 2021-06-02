<template>
    <div>
        <el-form ref="form" label-position="top">
            <Field
                v-for="(value, key) in fields"
                :key="key"
                :section="section_name"
                :model="value.name"
                :label="$t(value.label)"
                :placeholder="$t(value.placeholder)"
                :removable="value.removable"
                :type="value.type"
            ></Field>

            <AddField :section="section_name"></AddField>
        </el-form>
    </div>
</template>

<script>
import AddField from "../Fields/AddField";
import Field from "../Fields/Field";
import {mapState} from "vuex";
import EventBus from "../../eventBus";

export default {
    data(){
        return {
            section_name:"experience",
            fields:[
                {"name": "experience","label":"experience","placeholder":"", "removable": false, "type": "experience"},
            ]
        }
    },
    components: { AddField, Field },
    computed:{
        ...mapState([
            'formData'
        ])
    },
    mounted(){
        EventBus.$on('remove-field', payload => {
            if(payload.section && payload.section == this.section_name){
                this.fields.forEach( (value, key) => {
                    if(value.name === payload.model){
                        this.fields.splice(key, 1)
                    }
                })
            }
        })
        EventBus.$on('add-field', payload => {
            if (payload.section && payload.section == this.section_name) {
                this.fields.push({
                    "name": payload.id,
                    "label": payload.form.label,
                    "placeholder":"",
                    "removable": true,
                    "type": "text"
                })
                this.formData[this.section_name][payload.id] = payload.form.value
            }
        })
    }
}
</script>

<style scoped>

</style>
