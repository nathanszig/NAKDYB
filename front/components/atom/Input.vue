<script setup lang="ts">
defineProps({
  label: { type: String, default: "" },
  required: { type: Boolean, default: false },
  isPlayer: { type: Boolean, default: false },
});

const value = defineModel();
</script>

<template>
  <div class="flex flex-col gap-3">
    <label class="font-bold text-md">{{ label }}</label>
    <input
      class="bg-none outline-none border text-center text-lg p-2 font-bold"
      :class="isPlayer ? 'border-player' : 'border-admin'"
      type="text"
      v-model="value"
    />
  </div>
</template>
