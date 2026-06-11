<template>
    <div v-if="currentStep === 2">
        <h3>Formulaire étape 2</h3>
    </div>
</template>

<script setup>
const { currentStep } = defineProps({
    currentStep: Number,
})
</script>