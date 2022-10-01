<!--Generate a nav-->

<template>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">La Guía del Café</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <router-link to="/">
                        <a class="nav-link">Dashboard</a>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/admin-posts">
                        <a class="nav-link" href="#">Posts</a>
                    </router-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ajustes</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav admin-nav-options">
            <li class="nav-item">
                        <!--Dropdown customizable component
                    pass a text property to customize the text of the toggler button-->
                <Dropdown :text="data.admin.name">
                    <DropdownContent>
                        <!--Put inside this template #content elements you want to display-->
                        <template #content>
                            <a class="nav-link"
                                style="color:black"
                                href="#">Admin
                            </a>
                            <a class="nav-link"
                                style="color:black"
                                type="button"
                                @click="logout">Salir
                            </a>
                        </template>
                    </DropdownContent>
                </Dropdown>
            </li>
        </div>
    </nav>
</template>
<script setup>
    import axios from 'axios';
    import { onMounted, ref, reactive, onBeforeMount, inject } from 'vue'
    import DropdownContent from '../components/DropdownContent.vue'
    const adminId = inject('admin')
    const data = reactive({
        admin: {}
    })
    const logout = () => {
        axios.post('../logout')
        .then(response => {
            window.location.href = '../admin'
        })
        .catch(error => {
            console.log(error)
        })
    }
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
    .navbar {
        position:fixed;
        width: 100%;
        padding-left: 10vh;
        justify-content: space-between;
        background-color: rgb(165, 140, 123);
    }
    .navbar-nav > li {
        padding: 0 10px;
    }

    .navbar-nav > li > a {
        text-align: center;
        color: white;
    }
    .nav-link {
        cursor:pointer
    }
    .nav-item:hover {
        background-color: rgb(221, 190, 149);
    }
    .admin-nav-options {
        padding-right: 10vh;
    }
    .navbar-brand:hover{
        color: rgb(221, 190, 149);
    }
    a{
        text-decoration: none;
        color: white;
    }
</style>
