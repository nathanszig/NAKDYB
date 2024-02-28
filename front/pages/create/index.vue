<script setup>
const step = ref(0);
const {$api} = useNuxtApp();
const gameId = ref(null);
const gamePlayers = ref([]);

/* Init page with creation on the game */
const createGame = () => {
  $api.post("games", false, {name: ""}).then((result) => {
    gameId.value = result.id;
  });
};
createGame();

/* Function to get players eatch 5 secondes */
const getPlayers = () => {
  $api.get(`games/${gameId.value}`, false).then((result) => {
    gamePlayers.value = result.characters;
  });
};
setInterval(getPlayers, 5000);
</script>

<template>
  <NuxtLayout name="admin">
    <!-- HEADER -->
    <HeaderGameMaster :step="step"/>

    <!-- CONTENT -->
    <TplPlayers v-if="step === 0" :game-id="gameId"/>
    <div v-if="step === 1">aac</div>
    <div v-if="step === 2">cac</div>
    <div v-if="step === 3">cc</div>
    <div v-if="step === 4">cc</div>

    <!-- BUTTONS -->
    <ContainerButton v-model="step"/>
  </NuxtLayout>
</template>

<style lang="scss" scoped>

</style>
