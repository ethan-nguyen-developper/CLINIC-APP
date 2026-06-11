<template>
    <div class="form-group" v-bind="$attrs">
        <label for="" v-if="label !== ''">{{ label }}</label>
        <input v-if="type !== 'textarea'" type="type" class="form-control">
        <textarea v-if="type === 'textarea'" class="form-control"></textarea>
    </div>
</template>

<script setup>
defineProps({
    type: {
        required: true,
        type: String
    },
    label: String,
})
</script>