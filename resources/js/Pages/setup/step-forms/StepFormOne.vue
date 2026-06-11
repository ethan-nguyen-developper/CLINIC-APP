
<template>
    <div v-if="currentStep === 1">
        <FormSelect class="w-25" label="Langue utilisée" :options="langOptions" />
        <hr class="divider" />
        <FormInput type="text" label="Nom de la clinique" />
        <FormInput type="textarea" label="Description de la clinique" />
        <div class="d-flex">
            <FormSelect class="w-50 mr-5" label="Pays" :options="langOptions" />
            <FormSelect class="w-50" label="Ville" :options="langOptions" />
        </div>
        <hr class="divider" />
        <div class="d-flex">
            <FormInput type="text" label="Adresse" class="mr-3" style="width: 35%" />
            <FormInput type="text" label="Code Postal" class="mr-3" style="width: 30%" />
            <FormInput type="text" label="Téléphone" class="mr-3" style="width: 30%" />
        </div>
        <div class="form-group mr-3" style="width: 30%">
            <label for="">Logo</label>
            <input type="file" class="form-control">
        </div>
    </div>
</template>

<script setup>
import FormInput from '../../shared/forms/FormInput.vue';
import FormSelect from '../../shared/forms/FormSelect.vue';

const { currentStep } = defineProps({
    currentStep: Number,
})

const langOptions = [
    {
        value: 'fr',
        label: 'Français'
    },
    {
        value: 'en',
        label: 'Anglais'
    }
]
</script>