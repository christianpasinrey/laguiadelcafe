<template>
    <div class="admin-posts-container">
        <h2>POSTS</h2>
        <admin-posts-table></admin-posts-table>
        <p>{{data.admin.name}}</p>
    </div>
</template>
<script setup>
    import { ref, reactive, onBeforeMount, inject, provide } from 'vue';
    const adminId = inject('admin');
    const data = reactive({
        admin: {},
        posts: [],
    })
    const getPosts = async () => {
        const response = await fetch('../posts');
        data.posts = await response.json();
    }
    const getAdmin = async () => {
        const response = await fetch(`../admins/${adminId}`);
        data.admin = await response.json();
    }
    provide('posts', data.posts);
    onBeforeMount(() => {
        getAdmin();
        getPosts();
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
