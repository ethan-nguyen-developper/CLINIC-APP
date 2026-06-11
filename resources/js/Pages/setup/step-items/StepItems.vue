<template>
    <div class="stepper-items">
        <StepItem 
            v-for="item in items"
            :key="item.id"
            :step="item"
            :isActive="item.id === currentStep"
        />
    </div>
</template>

<script setup>
import StepItem from './StepItem.vue' // 🔥 AJOUTE ÇA

defineProps({
    currentStep: Number,
    items: Array
})
</script>

<style scoped>
.stepper-items {
    display: flex;
    gap: 16px;
    align-items: center;
}

.stepper-item-container {
    display: flex;
    gap: 16px;
    align-items: center;
    flex: 1;
}

.stepper-items .stepper-item {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
    font-size: 1.1em;
    background-color: transparent;
    border: 2px solid rgb(233, 236, 239);
}

.stepper-item.active {
    color: white;
    background-color: #007bff;
    border: none;
    box-shadow: 0 0 0 5px white, 0 0 0 7px #007bff;
}

.stepper-items .line {
    flex: 1;
}
.progress-bar,
.progress {
    height: 5px;
}
</style>