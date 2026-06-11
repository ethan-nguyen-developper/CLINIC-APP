<template>
  <AuthenticatedLayout>
    <h1 class="text-2xl font-bold mb-4">Clinics</h1>

    <Link
      href="/clinics/create"
      class="bg-blue-500 text-white px-4 py-2 rounded"
    >
      + New Clinic
    </Link>

    <div class="mt-4 bg-white p-4 rounded shadow">
      <input v-model="search" placeholder="Search clinic..." />

      <table class="w-full">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="clinic in clinics.data" :key="clinic.id">
            <td>{{ clinic.name }}</td>
            <td>{{ clinic.address }}</td>
            <td>{{ clinic.phone }}</td>
            <td>
              <Link :href="`/clinics/${clinic.id}/edit`">Edit</Link>

              <button @click="deleteClinic(clinic.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div v-if="clinics.links">
        <button
          v-for="link in clinics.links"
          :key="link.label"
          v-html="link.label"
          @click="link.url && router.get(link.url)"
          :disabled="!link.url"
        />
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref, watch } from 'vue'

const deleteClinic = (id) => {
  if (confirm('Delete this clinic ?')) {
    router.delete(`/clinics/${id}`)
  }
}

const props = defineProps({
  clinics: Object,
  filters: Object,
})

const search = ref(props.filters.search ?? '')

watch(search, (value) => {
  router.get(
    '/clinics',
    {
      search: value,
    },
    {
      preserveState: true,
      replace: true,
    }
  )
})
</script>
