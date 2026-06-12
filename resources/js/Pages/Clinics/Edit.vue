<template>
  <AppLayout>
    <h1>Edit Clinic</h1>

    <form @submit.prevent="submit">
      <div>
        <label>Name</label>
        <input v-model="form.name" type="text" />
        <div v-if="form.errors.name">{{ form.errors.name }}</div>
      </div>

      <div>
        <label>Address</label>
        <input v-model="form.address" type="text" />
      </div>

      <div>
        <label>Phone</label>
        <input v-model="form.phone" type="text" />
      </div>

      <button type="submit">Update</button>
    </form>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  clinic: Object,
})

const form = useForm({
  name: props.clinic.name,
  address: props.clinic.address,
  phone: props.clinic.phone,
})

const submit = () => {
  form.put(`/clinics/${props.clinic.id}`)
}
</script>
