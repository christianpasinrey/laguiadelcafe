<template>
    <div @click="toggle">
      <slot name="toggler">
        <button>{{text}}</button>
      </slot>
      <slot class="dropdown-content"/>
    </div>
  </template>
  <script setup>
    import {provide, reactive} from 'vue';
    const props = defineProps(['text']);
    const sharedState = reactive({
      active: false
    })
    provide('sharedState', sharedState);
    const toggle = () => {
      sharedState.active = !sharedState.active
    }
  </script>
<style scoped>
    div {
        display: inline-block;
        position: inherit;
        z-index: 1;
    }
    button {
        background-color: transparent;
        color: rgb(255, 255, 255);
        padding: 7px 8px;
        font-size: 15px;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: rgb(221, 190, 149);
        color:white;
    }
</style>
