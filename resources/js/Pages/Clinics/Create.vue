<template>
  <AuthenticatedLayout>
    <h1>Create Clinic</h1>

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

      <button type="submit">Save</button>
    </form>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  address: '',
  phone: '',
})

const submit = () => {
  form.post('/clinics')
}
</script>