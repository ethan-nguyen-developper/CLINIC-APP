<template>
    <div class="stepper-item-container">
        <div class="stepper-item" :class="{ active: isActive }">
            {{ step.id }}
        </div>

        <div class="line">
            <p class="mb-1">
                <small :class="{ 'text-muted': !isActive }">
                    {{ step.title }}
                </small>
            </p>

            <div class="progress">
                <div
                    class="progress-bar"
                    role="progressbar"
                    :style="{ width: (step.progress ?? 0) + '%' }"
                ></div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    step: Object,
    isActive: Boolean
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