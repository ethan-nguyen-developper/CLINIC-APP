<template>
    <div class="container" style="height: 100vh">
        <div class="row h-100">
            <div class="col my-auto" style="width: 700px; height: 700px">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Configuration de clinic App</h3>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <StepItems 
                            :currentStep="currentStep"
                            :items="stepItems"
                        />
                        <StepForms :current-step="currentStep"/>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <button :disabled="actionState.shouldDisablePrevButton" class="btn btn-default" @click="goToPrev">Précédent</button>
                            <button :disabled="actionState.shouldDisableNextButton" class="btn btn-primary" @click="goToNext">Suivant</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { computed, ref } from 'vue';
import StepItems from "./step-items/StepItems.vue"
import StepFormOne from "./step-forms/StepFormOne.vue"
import StepFormTwo from "./step-forms/StepFormTwo.vue"
import StepFormThree from "./step-forms/StepFormThree.vue"
import StepForms from "./step-forms/StepForms.vue"
const props = defineProps({
    username: String
});

const currentStep = ref(1);

const stepItems = computed(() => [
    {
        id: 1,
        title: "Information sur la clinique",
        progress: 0
    },
    {
        id: 2,
        title: "Horaire de service",
        progress: 0
    },
    {
        id: 3,
        title: "Administration",
        progress: 0
    }
]);

const goToNext = () => {
    if (currentStep.value < stepItems?.value?.length) {
        currentStep.value++;
    }
};

const goToPrev = () => {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
};

const actionState = computed(() => ({
    shouldDisablePrevButton: currentStep.value <=1,
    shouldDisableNextButton: currentStep.value === stepItems.value?.length
}))
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

.stepper-forms {
    padding-block: 20px;
    flex: 1;
    overflow-y: auto;
}
</style>