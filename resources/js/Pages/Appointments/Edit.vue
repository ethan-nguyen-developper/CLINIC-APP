<template>
  <AppLayout>
    <PageHeader>
      <template #title>Edit Appointment</template>
    </PageHeader>

    <form
      @submit.prevent="submit"
      class="bg-white p-4 rounded shadow space-y-3"
    >
      <!-- Patient -->
      <select v-model="form.patient_id" class="border p-2 w-full">
        <option v-for="p in patients" :key="p.id" :value="p.id">
          {{ p.first_name }} {{ p.last_name }}
        </option>
      </select>

      <!-- Doctor -->
      <select v-model="form.doctor_id" class="border p-2 w-full">
        <option v-for="d in doctors" :key="d.id" :value="d.id">
          {{ d.first_name }} {{ d.last_name }}
        </option>
      </select>

      <!-- Date -->
      <input type="date" v-model="form.date" class="border p-2 w-full" />

      <!-- Time -->
      <input type="time" v-model="form.time" class="border p-2 w-full" />

      <!-- Status -->
      <select v-model="form.status" class="border p-2 w-full">
        <option value="pending">Pending</option>
        <option value="confirmed">Confirmed</option>
        <option value="cancelled">Cancelled</option>
      </select>

      <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>

      <div v-if="form.errors.time" class="text-red-500">
        {{ form.errors.time }}
      </div>
    </form>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import PageHeader from '@/Components/ui/PageHeader.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  appointment: Object,
  doctors: Array,
  patients: Array,
})

const form = useForm({
  patient_id: props.appointment.patient_id,
  doctor_id: props.appointment.doctor_id,
  date: props.appointment.date,
  time: props.appointment.time,
  status: props.appointment.status,
})

const submit = () => {
  form.put(`/appointments/${props.appointment.id}`)
}
</script>
