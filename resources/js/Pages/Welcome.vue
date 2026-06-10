<template>
    <h1>Bienvenue {{ username }}</h1>
</template>
<script setup>
const props = defineProps({
    username: String
})
</script>