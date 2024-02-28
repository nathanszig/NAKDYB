<script setup lang="ts">
const gameId = ref("");
const username = ref("");
const stats = ref({
  physical: 5,
  mental: 5,
  social: 5,
});

const remaingingStatsPoints = computed(() => {
  return 20 - stats.value.physical - stats.value.mental - stats.value.social;
});

const error = ref(null as string | null);
const step = ref(0);

const { $api } = useNuxtApp();

const checkGameId = async () => {
  error.value = null;
  $api
    .get(`games/${gameId.value}`, false)
    .then(() => {
      step.value++;
    })
    .catch(() => {
      error.value = "No game found";
    });
};

const next = () => {
  step.value++;
};

const save = () => {
  $api
    .post(`characters`, false, {
      name: username.value,
      role: "player",
      physical: stats.value.physical,
      mental: stats.value.mental,
      social: stats.value.social,
      game: `/api/games/${gameId.value}`,
    })
    .then((result: any) => {
      useRouter().push(`/play/${result.id}`);
    });
};
</script>

<template>
  <NuxtLayout name="player">
    <!-- CONTENT -->
    <Input v-if="step == 0" label="Game ID" v-model="gameId" :isPlayer="true" />
    <Input
      v-else-if="step == 1"
      label="Username"
      v-model="username"
      :isPlayer="true"
    />
    <div v-else-if="step == 2">
      <p class="font-bold text-md mb-2">Your statistics</p>
      <TableNumberPlayer v-model="stats" :isEdit="true" />
      <p
        v-if="remaingingStatsPoints"
        class="text-right w-full text-player mt-2 text-xs"
      >
        {{ remaingingStatsPoints }} remaining points
      </p>
    </div>

    <!-- ERROR -->
    <p class="text-danger w-full text-center mt-2">{{ error }}</p>

    <!-- SPACE -->
    <div class="flex-1" />

    <!-- BUTTON -->
    <Button
      v-if="step == 0"
      name="Join the game"
      class="!w-full"
      :isPlayer="true"
      :isActive="true"
      @click="checkGameId"
    />
    <Button
      v-else-if="step == 1"
      name="Next"
      class="!w-full"
      :isPlayer="true"
      :isActive="true"
      @click="next"
    />
    <Button
      v-else-if="step == 2"
      name="Start"
      class="!w-full"
      :isPlayer="true"
      :isActive="true"
      @click="save"
    />
  </NuxtLayout>
</template>
