<template>
  <AuthenticatedLayout>
    <h1>Dashboard</h1>

    <div>
      <p>Clinics: {{ stats.clinics }}</p>
      <p>Patients: {{ stats.patients }}</p>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

defineProps({
  stats: Object,
})
</script>
