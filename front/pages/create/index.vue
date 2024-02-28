<script setup>
const step = ref(0);
const {$api} = useNuxtApp();
const gameId = ref(null);
const gamePlayers = ref([]);
const features = ref(["physical", "mental", "social"]);
const newsChoice = ref([]);
const placeChoice = ref([]);
const monsterChoice = ref([]);
const pnjChoice = ref([]);

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
    newsChoice.value = result["hydra:member"]
  });
};
getNews()

/* Function to get choices of places */
const getPlaces = () => {
  $api.get("places", false).then((result) => {
    placeChoice.value = result["hydra:member"]
  });
};
getPlaces()

/* Function to get choices of monsters */
const getMonsters = () => {
  $api.get("monsters", false).then((result) => {
    monsterChoice.value = result["hydra:member"]
  });
};
getMonsters()

/* Function to get choices of PNJs */
const getPnjs = () => {
  $api.get("pnjs", false).then((result) => {
    pnjChoice.value = result["hydra:member"];
  });
};
getPnjs()

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
    <TplPlayers v-if="step === 0" :game-id="gameId" :table="gamePlayers" :features="features"/>
    <TplNews v-if="step === 1" :table="newsChoice" />
    <div v-if="step === 2">cac</div>
    <div v-if="step === 3">cc</div>
    <div v-if="step === 4">cc</div>

    <!-- BUTTONS -->
    <ContainerButton v-model="step"/>
  </NuxtLayout>
</template>

<style lang="scss" scoped>

</style>
