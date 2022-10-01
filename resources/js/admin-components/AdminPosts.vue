<template>
    <div class="admin-posts-container">
        <h2>POSTS</h2>
        <p>{{data.admin.name}}</p>
    </div>
</template>
<script setup>
    import { ref, reactive, onBeforeMount, inject } from 'vue';
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
.admin-posts-container {
    margin-top:15vh;
    padding: 0 10vw;
    margin-left: 10vw;
    margin-right: 10vw;
    width: 80vw;
    border: 1px solid black;
};
</style>
