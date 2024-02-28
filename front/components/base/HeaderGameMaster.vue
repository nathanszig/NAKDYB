<script setup lang="ts">
defineProps({
  step: {
    type: Number,
    required: true
  }
})
</script>

<template>
  <header class="border-b border-white border-solid flex pb-5 items-center">
    <h1 class="text-admin text-2xl font-bold w-1/2">GAME MASTER</h1>
    <div class="w-1/2 flex justify-center">
      <Stepper
          :step="step"
          :steps="['Players', 'News', 'Places', 'Monsters', 'PNJs']"
          class="w-full max-w-md mx-auto md:col-span-2 lg:col-span-1"
      />
    </div>
  </header>
</template>

<style scoped lang="scss">
header{
  margin-bottom: 50px;
}
</style>
