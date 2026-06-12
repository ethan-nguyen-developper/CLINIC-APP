<template>
  <div class="flex h-screen bg-gray-50">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r">
      <div class="p-4 font-bold text-xl">Clinic SaaS</div>

      <nav class="p-4 space-y-2">
        <Link
          href="/dashboard"
          class="block px-3 py-2 rounded hover:bg-gray-100"
          :class="{
            'bg-gray-100 font-semibold': $page.url.startsWith('/dashboard'),
          }"
        >
          Dashboard
        </Link>
        <Link
          href="/clinics"
          class="block px-3 py-2 rounded hover:bg-gray-100"
          :class="{
            'bg-gray-100 font-semibold': $page.url.startsWith('/clinics'),
          }"
        >
          Clinics
        </Link>
        <Link
          href="/doctors"
          class="block px-3 py-2 rounded hover:bg-gray-100"
          :class="{
            'bg-gray-100 font-semibold': $page.url.startsWith('/doctors'),
          }"
        >
          Doctors
        </Link>
        <Link
          href="/patients"
          class="block px-3 py-2 rounded hover:bg-gray-100"
          :class="{
            'bg-gray-100 font-semibold': $page.url.startsWith('/patients'),
          }"
        >
          Patients
        </Link>
        <Link
          href="/appointments"
          class="block px-3 py-2 rounded hover:bg-gray-100"
          :class="{
            'bg-gray-100 font-semibold': $page.url.startsWith('/appointments'),
          }"
        >
          Appointments
        </Link>
      </nav>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">
      <!-- TOPBAR -->
      <header
        class="h-14 bg-white border-b flex items-center justify-between px-4"
      >
        <div>Dashboard</div>

        <div class="text-sm text-gray-600">
          {{ $page.props.auth.user.name }}
        </div>
      </header>

      <!-- CONTENT -->
      <main class="p-6 space-y-6">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
