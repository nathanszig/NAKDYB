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
    gamePlayers.value = [];
    result.characters.forEach((charUri) => {
      charUri = charUri.replace("/api/", "");
      $api.get(charUri, false).then((char) => {
        gamePlayers.value.push(char);
      });
    });
  });
};
setInterval(getPlayers, 5000);

/* Function to get choices of news */
const getNews = () => {
  $api.get("news", false).then((result) => {
    console.log(result["hydra:member"]);
  });
};

/* Function to get choices of places */
const getPlaces = () => {
  $api.get("places", false).then((result) => {
    console.log(result["hydra:member"]);
  });
};

/* Function to get choices of monsters */
const getMonsters = () => {
  $api.get("monsters", false).then((result) => {
    console.log(result["hydra:member"]);
  });
};

/* Function to get choices of PNJs */
const getPnjs = () => {
  $api.get("pnjs", false).then((result) => {
    console.log(result["hydra:member"]);
  });
};

/* Function to generate final game */
const generateGame = () => {
  $api
    .put(`games/${gameId}`, false, {
      name: "Generated",
      news: "",
      places: [],
      npcs: [],
      characters: [],
      monsters: [],
    })
    .then((result) => {
      gameId.value = result.id;
    });
};
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
