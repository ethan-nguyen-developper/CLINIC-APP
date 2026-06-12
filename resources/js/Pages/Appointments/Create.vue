<template>
  <AppLayout>
    <h1>Create Appointment</h1>

    <form @submit.prevent="submit">
      <select v-model="form.patient_id">
        <option v-for="p in patients" :key="p.id" :value="p.id">
          {{ p.first_name }} {{ p.last_name }}
        </option>
      </select>

      <select v-model="form.doctor_id">
        <option v-for="d in doctors" :key="d.id" :value="d.id">
          {{ d.first_name }} {{ d.last_name }}
        </option>
      </select>

      <input type="date" v-model="form.date" />
      <input type="time" v-model="form.time" />

      <button type="submit">Save</button>

      <div v-if="form.errors.time">
        {{ form.errors.time }}
      </div>
    </form>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  doctors: Array,
  patients: Array,
})

const form = useForm({
  patient_id: '',
  doctor_id: '',
  date: '',
  time: '',
})

const submit = () => {
  form.post('/appointments')
}
</script>
