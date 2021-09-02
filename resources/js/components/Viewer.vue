<template>
    <div class="flex flex-col justify-start items-center h-full">
        <div class="sheet" id="sheet">
            <div class="flex flex-row h-full w-full">
                <div class="deco_bar"></div>
                <div id="personal_info" class="flex-grow p-4">
                    <h1 class="text-center">{{ formData.personal_info.firstname }} {{ formData.personal_info.lastname }}</h1>
                    <p class="text-center">{{ formData.personal_info.email }}</p>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    data(){
        return {

        }
    },
    computed:{
        ...mapState(['formData'])
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
</style>
