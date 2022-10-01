<template>
    <div class="row">
        <admin-navbar></admin-navbar>
    </div>
    <div class="row">
        <router-view :key="route.fullPath"></router-view>
    </div>
</template>
<script setup>
    import { provide, ref } from 'vue'
    import { useRoute} from 'vue-router'
    const route = useRoute()
    const props = defineProps(['admin'])
    provide('admin', props.admin)
</script>
<style scoped>
    #app {
        font-family: 'Nunito', sans-serif;
        text-align: center;
        color: #b3c1cf;
    }
</style>
