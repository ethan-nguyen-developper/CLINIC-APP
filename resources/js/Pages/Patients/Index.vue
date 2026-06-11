<template>
  <AuthenticatedLayout>
    <h1 class="text-2xl font-bold mb-4">Patients</h1>

    <!-- SEARCH + FILTER -->
    <div class="flex gap-2 mb-4">
      <input v-model="search" placeholder="Search patient..." />

      <select v-model="clinicFilter">
        <option value="">All Clinics</option>
        <option v-for="c in clinics" :key="c.id" :value="c.id">
          {{ c.name }}
        </option>
      </select>

      <Link href="/patients/create">+ Add Patient</Link>
    </div>

    <!-- TABLE -->
    <table>
      <tr v-for="p in patients.data" :key="p.id">
        <td>{{ p.first_name }} {{ p.last_name }}</td>
        <td>{{ p.phone }}</td>
        <td>{{ p.clinic?.name }}</td>

        <td>
          <Link :href="`/patients/${p.id}/edit`">Edit</Link>
          <button @click="destroy(p.id)">Delete</button>
        </td>
      </tr>
    </table>

    <!-- PAGINATION -->
    <div>
      <button
        v-for="l in patients.links"
        :key="l.label"
        v-html="l.label"
        @click="l.url && router.get(l.url)"
      />
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { router, Link } from '@inertiajs/vue3'
import { ref, watch } from 'vue'

const props = defineProps({
  patients: Object,
  clinics: Array,
  filters: Object
})

const search = ref(props.filters.search ?? '')
const clinicFilter = ref(props.filters.clinic_id ?? '')

watch([search, clinicFilter], () => {
  router.get('/patients', {
    search: search.value,
    clinic_id: clinicFilter.value
  }, {
    preserveState: true,
    replace: true
  })
})

const destroy = (id) => {
  if (confirm('Delete patient?')) {
    router.delete(`/patients/${id}`)
  }
}
</script>