<template>
  <div class="min-h-screen bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white border-b px-4 py-3 flex justify-between">
      <div class="font-bold">
        ClinicApp
      </div>

      <div class="space-x-4">
        <Link href="/dashboard">Dashboard</Link>
        <Link href="/clinics">Clinics</Link>
        <Link href="/logout" method="post" as="button">
          Logout
        </Link>
      </div>
    </nav>

    <!-- CONTENT -->
    <main class="p-6">
      <slot />
    </main>

  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>