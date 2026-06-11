<template>
  <AuthenticatedLayout>
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="bg-white p-4 rounded shadow">
      Bienvenue 👋 tu es connecté !
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
</script>