<template>
  <AuthenticatedLayout>
    <h1>Create Doctor</h1>

    <form @submit.prevent="submit">
      <input v-model="form.first_name" placeholder="First name" />
      <input v-model="form.last_name" placeholder="Last name" />
      <input v-model="form.speciality" placeholder="Speciality" />
      <input v-model="form.phone" placeholder="Phone" />
      <input v-model="form.email" placeholder="Email" />

      <select v-model="form.clinic_id">
        <option v-for="c in clinics" :key="c.id" :value="c.id">
          {{ c.name }}
        </option>
      </select>

      <button type="submit">Save</button>
    </form>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  clinics: Array,
})

const form = useForm({
  first_name: '',
  last_name: '',
  speciality: '',
  phone: '',
  email: '',
  clinic_id: '',
})

const submit = () => {
  form.post('/doctors')
}
</script>
