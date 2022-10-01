<template>
<div class="dashboard-container">
    <h1>{{data.admin.name}}</h1>
</div>
</template>
<script setup>
    import { ref, reactive, onBeforeMount, inject } from 'vue'
    const adminId = inject('admin');
    const data = reactive({
        admin: {}
    })
    onBeforeMount(() => {
        axios.get(`../admins/${adminId}`)
        .then(response => {
            data.admin = response.data
        })
        .catch(error => {
            console.log(error)
        })
    })
</script>
<style scoped>
.dashboard-container {
    margin-top:15vh;
    padding: 0 10vw;
}
</style>
