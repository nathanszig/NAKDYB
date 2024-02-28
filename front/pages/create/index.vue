<script setup lang="ts">
const step = ref(0);
const { $api } = useNuxtApp();
const gameId = ref(null);
const gamePlayers = ref([]);

/* Init page with creation on the game */
const createGame = () => {
  $api.post("games", false, { name: "" }).then((result: any) => {
    gameId.value = result.id;
  });
};
createGame();

/* Function to get players eatch 5 secondes */
const getPlayers = () => {
  $api.get(`games/${gameId.value}`, false).then((result: any) => {
    gamePlayers.value = result.characters;
  });
};
setInterval(getPlayers, 5000);

/* Function to move to the next step */
const nextStep = () => {
  step.value++;
};
</script>

<template>
  <NuxtLayout name="admin">
    <!-- HEADER -->
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

    <!-- CONTENT -->
    <div class="bg-danger">content</div>
  </NuxtLayout>
</template>
