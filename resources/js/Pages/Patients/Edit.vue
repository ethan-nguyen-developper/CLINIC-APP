<template>
  <AuthenticatedLayout>
    <h1>Edit Patient</h1>

    <form @submit.prevent="submit">

      <input v-model="form.first_name" />
      <input v-model="form.last_name" />
      <input v-model="form.phone" />
      <input type="date" v-model="form.birthdate" />

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
  patient: Object,
  clinics: Array
})

const form = useForm({
  first_name: props.patient.first_name,
  last_name: props.patient.last_name,
  phone: props.patient.phone,
  birthdate: props.patient.birthdate,
  clinic_id: props.patient.clinic_id
})

const submit = () => {
  form.put(`/patients/${props.patient.id}`)
}
</script>