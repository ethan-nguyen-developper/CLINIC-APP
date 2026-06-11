<template>
  <AuthenticatedLayout>
    <h1>Edit Doctor</h1>

    <form @submit.prevent="submit">

      <input v-model="form.first_name" />
      <input v-model="form.last_name" />
      <input v-model="form.speciality" />
      <input v-model="form.phone" />
      <input v-model="form.email" />

      <select v-model="form.clinic_id">
        <option v-for="c in clinics" :key="c.id" :value="c.id">
          {{ c.name }}
        </option>
      </select>

      <button type="submit">Update</button>

    </form>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  doctor: Object,
  clinics: Array
})

const form = useForm({
  first_name: props.doctor.first_name,
  last_name: props.doctor.last_name,
  speciality: props.doctor.speciality,
  phone: props.doctor.phone,
  email: props.doctor.email,
  clinic_id: props.doctor.clinic_id
})

const submit = () => {
  form.put(`/doctors/${props.doctor.id}`)
}
</script>