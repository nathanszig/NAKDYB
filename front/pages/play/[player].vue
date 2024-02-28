<script setup lang="ts">
const playerId = useRoute().params.player;

const username = ref("");
const stats = ref(null as any);

const { $api } = useNuxtApp();

const getData = () => {
  $api.get(`characters/${playerId}`, false).then((result: any) => {
    username.value = result.name;
    stats.value = {
      physical: result.physical,
      mental: result.mental,
      social: result.social,
    };
  });
};

getData();
</script>

<template>
  <NuxtLayout name="player">
    <p class="w-full text-center font-bold text-lg uppercase-first -mt-40">
      {{ username }}
    </p>

    <p class="mt-40">
      <p class="font-bold text-md mb-2">Your statistics</p>
      <TableNumberPlayer v-model="stats" :isEdit="false" />
    </p>

    <div class="flex-1" />

    <Button
      name="Reload"
      @click="getData"
      :isPlayer="true"
      :isActive="true"
      class="!w-full"
    />
  </NuxtLayout>
</template>
