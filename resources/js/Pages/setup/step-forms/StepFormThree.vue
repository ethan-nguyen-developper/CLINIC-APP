<template>
    <div v-if="currentStep === 3">
        <div class="d-flex">
            <FormInput type="text" label="Nom" class="mr-3" style="width: 50%" />
            <FormInput type="text" label="Prénom" class="mr-3" style="width: 50%" />
            
        </div>
        <FormSelect :options="genres" label="Genre" class="w-50" />
        <div class="d-flex">
            <FormInput type="email" label="Adresse electronique" class="mr-3" style="width: 35%" />
            <FormInput type="text" label="Adresse domicile" class="mr-3" style="width: 35%" />
            <FormInput type="text" label="Téléphone" class="mr-3" style="width: 30%" />
        </div>
        <FormInput type="password" label="Mot de passe" class="w-50" />
        <FormInput type="password" label="Confirmation de mot de passe" class="w-50" />
    </div>
</template>

<script setup>
import FormInput from '../../shared/forms/FormInput.vue';
import FormSelect from '../../shared/forms/FormSelect.vue';

const { currentStep } = defineProps({
    currentStep: Number,
})

const genres = [
    {
        value: 'H',
        label: 'Homme'
    },
    {
        value: 'F',
        label: 'Femme'
    },
]
</script>