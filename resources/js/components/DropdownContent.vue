<template>
    <div v-if="active">
      <slot name="content"/>
    </div>
</template>
<script setup>
    import {inject, computed} from 'vue';
    const active = computed(() => {
      return inject('sharedState').active
    })
</script>
<style scoped>
    div {
        position:absolute;
        z-index: 2;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 6%;
        background-color: white;
    }
</style>
