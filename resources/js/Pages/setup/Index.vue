<template>
    <div>
        <input v-model="form.name" class="form-control" placeholder="Nom clinique">

        <textarea v-model="form.description" class="form-control"></textarea>

        <input v-model="form.country" class="form-control" placeholder="Pays">

        <input v-model="form.city" class="form-control" placeholder="Ville">

        <button @click="submitStep1" class="btn btn-primary">
            Sauvegarder étape 1
        </button>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import { reactive } from 'vue'

const form = reactive({
    name: '',
    description: '',
    country: '',
    city: '',
})

const submitStep1 = () => {
    router.post('/setup/step-1', form, {
        onSuccess: () => {
            console.log('Clinic créée')
        }
    })
}
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