<template>
  <AppLayout>
    <PageHeader>
      <template #title>Doctors</template>

      <template #actions>
        <Link href="/doctors/create">
          <Button>+ New Doctor</Button>
        </Link>
      </template>
    </PageHeader>

    <div class="mb-4">
      <input
        v-model="search"
        placeholder="Search doctor..."
        class="border rounded px-2 py-1 w-full"
      />
    </div>

    <Table>
      <thead class="bg-gray-50 text-gray-600 text-left">
        <tr>
          <th class="p-3">First name</th>
          <th class="p-3">Last name</th>
          <th class="p-3">Speciality</th>
          <th class="p-3">Phone</th>
          <th class="p-3">Email</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-100">
        <tr
          v-for="doctor in doctors.data"
          :key="doctor.id"
          class="hover:bg-gray-50 transition"
        >
          <td class="p-3">{{ doctor.first_name }}</td>
          <td class="p-3">{{ doctor.last_name }}</td>
          <td class="p-3">{{ doctor.speciality }}</td>
          <td class="p-3">{{ doctor.phone }}</td>
          <td class="p-3">{{ doctor.email }}</td>

          <td class="p-3 space-x-2">
            <Link :href="`/doctors/${doctor.id}/edit`">Edit</Link>
            <button @click="destroy(doctor.id)">Delete</button>
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
  doctors: Object,
  filters: Object,
})

const search = ref(props.filters.search ?? '')

watch(search, (value) => {
  router.get(
    '/doctors',
    { search: value },
    {
      preserveState: true,
      replace: true,
    }
  )
})

const destroy = (id) => {
  if (confirm('Delete doctor?')) {
    router.delete(`/doctors/${id}`)
  }
}
</script>
