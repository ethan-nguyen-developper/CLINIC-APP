<template>
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">
      <slot name="title" />
    </h1>

    <div>
      <slot name="actions" />
    </div>
  </div>
</template>
