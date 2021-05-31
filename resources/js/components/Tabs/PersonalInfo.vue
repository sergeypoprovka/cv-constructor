<template>
    <div>
        <el-form ref="form" label-position="top">
            <TextField
                v-for="(value, key) in fields"
                :key="key"
                :section="section_name"
                :model="value.name"
                :label="$t(value.label)"
                :placeholder="$t(value.placeholder)"
                :removable="value.removable"
            ></TextField>

            <AddField></AddField>

            <el-button @click.prevent="submit">Submit</el-button>
        </el-form>
    </div>
</template>

<script>
import TextField from '../Fields/TextField'
import { mapState } from 'vuex'
import AddField from "../Fields/AddField";
import EventBus from "../../eventBus";
export default {
    data(){
        return {
            section_name:"personal_info",
            fields:[
                {"name": "firstname","label":"First name","placeholder":"Please enter your first name", "removable": false, "type": "text"},
                {"name": "lastname","label":"Last name","placeholder":"Please enter your last name", "removable": false, "type": "text"},
                {"name": "email","label":"E-mail","placeholder":"Please enter e-mail", "removable": false, "type": "text"},
                {"name": "phone","label":"Phone","placeholder":"Please enter your phone number", "removable": false, "type": "text"},
                {"name": "address","label":"Address","placeholder":"Please enter your address", "removable": true, "type": "textarea"},
                {"name": "portfolio","label":"Portfolio","placeholder":"Please enter your portfolio link", "removable": true, "type": "text"},
            ]
        }
    },
    components: { AddField, TextField },
    methods:{
        submit(){
            console.log(this.$store.state)
        }
    },
    computed:{
        ...mapState([
            'formData'
        ])
    },
    mounted(){
        EventBus.$on('remove-field', payload => {
            if(payload.section && payload.section == "personal_info"){
                this.fields.forEach( (value, key) => {
                    if(value.name === payload.model){
                        this.fields.splice(key, 1)
                    }
                })
            }
        })
    }
}
</script>

<style scoped>

</style>
