<template>
    <h1>{{ currentTab.name }}</h1>
</template>

<script>
import { mapState } from 'vuex'
export default {
    computed:{
        ...mapState(['currentTab'])
    }
}
</script>

<style scoped>

</style>
