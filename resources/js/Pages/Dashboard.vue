<template>
  <AuthenticatedLayout>
    <h1>Dashboard</h1>

    <div>
      <p>Total Clinics: {{ stats.clinics }}</p>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

defineProps({
  stats: Object
})
</script>