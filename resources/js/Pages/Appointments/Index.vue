<template>
  <AuthenticatedLayout>
    <h1>Appointments</h1>

    <Link href="/appointments/create">+ New Appointment</Link>

    <table>
      <tr v-for="a in appointments" :key="a.id">
        <td>{{ a.patient.first_name }} {{ a.patient.last_name }}</td>
        <td>{{ a.doctor.first_name }} {{ a.doctor.last_name }}</td>
        <td>{{ a.date }}</td>
        <td>{{ a.time }}</td>

        <td>
          <button @click="destroy(a.id)">Delete</button>
        </td>
      </tr>
    </table>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, router } from '@inertiajs/vue3'

defineProps({
  appointments: Array,
})

const destroy = (id) => {
  if (confirm('Delete appointment?')) {
    router.delete(`/appointments/${id}`)
  }
}
</script>
