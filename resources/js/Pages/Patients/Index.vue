<template>
  <AppLayout>
    <PageHeader>
      <template #title>Patients</template>

      <template #actions>
        <Link href="/patients/create">
          <Button>+ New Patient</Button>
        </Link>
      </template>
    </PageHeader>

    <div class="mb-4">
      <input
        v-model="search"
        placeholder="Search patient..."
        class="border rounded px-2 py-1 w-full"
      />
    </div>

    <Table>
      <thead class="bg-gray-50 text-gray-600 text-left">
        <tr>
          <th class="p-3">First name</th>
          <th class="p-3">Last name</th>
          <th class="p-3">Phone</th>
          <th class="p-3">Birthdate</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100">
        <tr
          v-for="patient in patients.data"
          :key="patient.id"
          class="hover:bg-gray-50 transition"
        >
          <td class="p-3">{{ patient.first_name }}</td>
          <td class="p-3">{{ patient.last_name }}</td>
          <td class="p-3">{{ patient.phone }}</td>
          <td class="p-3">{{ patient.birthdate }}</td>

          <td class="p-3 space-x-2">
            <Link :href="`/patients/${patient.id}/edit`">Edit</Link>
            <button @click="destroy(patient.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </Table>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import PageHeader from '@/Components/ui/PageHeader.vue'
import Table from '@/Components/ui/Table.vue'
import Button from '@/Components/ui/Button.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref, watch } from 'vue'

const props = defineProps({
  patients: Object,
  filters: Object,
})

const search = ref(props.filters.search ?? '')

watch(search, (value) => {
  router.get(
    '/patients',
    { search: value },
    {
      preserveState: true,
      replace: true,
    }
  )
})

const destroy = (id) => {
  if (confirm('Delete patient?')) {
    router.delete(`/patients/${id}`)
  }
}
</script>
