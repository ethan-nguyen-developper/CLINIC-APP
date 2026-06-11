<template>
  <AuthenticatedLayout>
    <h1>Doctors</h1>

    <Link href="/doctors/create">+ Add Doctor</Link>

    <table>
      <tr v-for="d in doctors" :key="d.id">
        <td>{{ d.first_name }} {{ d.last_name }}</td>
        <td>{{ d.speciality }}</td>
        <td>{{ d.clinic?.name }}</td>

        <td>
          <Link :href="`/doctors/${d.id}/edit`">Edit</Link>
          <button @click="destroy(d.id)">Delete</button>
        </td>
      </tr>
    </table>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, router } from '@inertiajs/vue3'

defineProps({
  doctors: Array
})

const destroy = (id) => {
  if (confirm('Delete doctor?')) {
    router.delete(`/doctors/${id}`)
  }
}
</script>