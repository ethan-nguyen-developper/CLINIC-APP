<template>
  <AppLayout>
    <PageHeader>
      <template #title>Clinics</template>

      <template #actions>
        <Link href="/clinics/create">
          <Button>+ New Clinic</Button>
        </Link>
      </template>
    </PageHeader>

    <div class="mb-4">
      <input
        v-model="search"
        placeholder="Search clinic..."
        class="border rounded px-2 py-1 w-full"
      />
    </div>

    <Table>
      <thead class="bg-gray-50 text-gray-600 text-left">
        <tr>
          <th class="p-3">Name</th>
          <th class="p-3">Address</th>
          <th class="p-3">Phone</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100">
        <tr
          v-for="clinic in clinics.data"
          :key="clinic.id"
          class="hover:bg-gray-50 transition"
        >
          <td class="p-3">{{ clinic.name }}</td>
          <td class="p-3">{{ clinic.address }}</td>
          <td class="p-3">{{ clinic.phone }}</td>

          <td class="p-3 space-x-2">
            <Link :href="`/clinics/${clinic.id}/edit`">Edit</Link>
            <button @click="destroy(clinic.id)">Delete</button>
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
  clinics: Object,
  filters: Object,
})

const search = ref(props.filters.search ?? '')

watch(search, (value) => {
  router.get(
    '/clinics',
    { search: value },
    {
      preserveState: true,
      replace: true,
    }
  )
})

const destroy = (id) => {
  if (confirm('Delete clinic?')) {
    router.delete(`/clinics/${id}`)
  }
}
</script>
