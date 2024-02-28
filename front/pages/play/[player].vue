<script setup lang="ts">
const playerId = useRoute().params.player;

const username = ref("");
const stats = ref({
  health: 5,
  strenght: 5,
  speed: 5,
  smart: 5,
  chance: 5,
});
</script>

<template>
  <NuxtLayout name="player">
    <p class="w-full text-center font-bold text-lg uppercase-first -mt-40">
      {{ username }}
    </p>

    <p class="mt-40">
      {{ stats }}
    </p>
  </NuxtLayout>
</template>
