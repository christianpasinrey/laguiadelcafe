<!--Generate a nav-->

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">La Guía del Café</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:black" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:black" href="#">{{data.admin.name}}</a>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script setup>
    import axios from 'axios';
import { onMounted, ref, reactive, onBeforeMount } from 'vue'
    import DropdownContent from '../components/DropdownContent.vue'
    const props = defineProps(['admin']);
    const data = reactive({
        admin: ref({})
    })

    onBeforeMount(() => {
        axios.get(`${props.admin}`)
            .then(response => {
                data.admin = response.data
            })
            .catch(error => {
                console.log(error)
            })
    })
</script>
<style scoped>
    /* Make navbar full width and responsive, add padding between items and put it centered */
    .navbar {
        width: 100%;
        padding-left: 10vh;
    }
    .navbar-nav {
        width: 100%;
    }

    .navbar-nav > li {
        padding: 0 10px;
    }

    .navbar-nav > li > a {
        text-align: center;
    }


</style>
