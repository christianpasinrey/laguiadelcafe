<template>
    <div id="app">
        <h1>La Guía del Café</h1>
        <p>{{ message }}</p>
    </div>
</template>
<script setup>
    import { ref } from 'vue'
    const message = ref('Hello Usuario!')
</script>
<style scoped>
    #app {
        font-family: 'Nunito', sans-serif;
        text-align: center;
        color: #b3c1cf;
    }
</style>
