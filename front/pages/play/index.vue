<script setup lang="ts">
const gameId = ref("");
const username = ref("");
const error = ref(null as string | null);
const step = ref(0);

const checkGameId = async () => {
  error.value = null;
  const { $api } = useNuxtApp();
  $api
    .get(`games/${gameId.value}`, false)
    .then((response) => {
      step.value++;
    })
    .catch((err) => {
      error.value = "No game found";
    });
};

const next = () => {
  step.value++;
};

const save = () => {
  console.log("Save");
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
