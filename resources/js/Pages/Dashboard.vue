<template>
  <AppLayout>
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-4 gap-4">
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="text-gray-500 text-sm">Clinics</div>
        <div class="text-2xl font-semibold">{{ stats.clinics }}</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="text-gray-500 text-sm">Doctors</div>
        <div class="text-2xl font-semibold">{{ stats.doctors }}</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="text-gray-500 text-sm">Patients</div>
        <div class="text-2xl font-semibold">{{ stats.patients }}</div>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="text-gray-500 text-sm">Apointments</div>
        <div class="text-2xl font-semibold">{{ stats.apointments }}</div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

defineProps({
  stats: Object,
})
</script>
