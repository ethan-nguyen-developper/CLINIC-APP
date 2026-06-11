<template>
  <div class="min-h-screen bg-gray-100">
    <!-- NAVBAR -->
    <nav class="bg-white border-b px-4 py-3 flex justify-between">
      <div class="font-bold">ClinicApp</div>

      <div class="space-x-4">
        <Link href="/dashboard">Dashboard</Link>
        <Link href="/clinics">Clinics</Link>
        <Link href="/patients">Patients</Link>
        <Link href="/doctors">Doctors</Link>
        <Link href="/logout" method="post" as="button"> Logout </Link>
      </div>
    </nav>

    <!-- CONTENT -->
    <main class="p-6">
      <slot />
    </main>
  </div>

  <notifications position="top right" />
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'
import { watch } from 'vue'
import { notify } from "@kyvg/vue3-notification"

const page = usePage()

watch(
  () => page.props.flash,
  (flash) => {
    if (flash?.success) {
      notify({
        type: 'success',
        text: flash.success
      })
    }

    if (flash?.error) {
      notify({
        type: 'error',
        text: flash.error
      })
    }
  },
  { deep: true }
)
</script>
