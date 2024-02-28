<script setup>
const step = ref(0);
const { $api } = useNuxtApp();
const gameId = ref(null);
const gamePlayers = ref([]);

/* Init page with creation on the game */
const createGame = () => {
  $api.post("games", false, { name: "" }).then((result) => {
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

/* Function to move to the next step */
const nextStep = () => {
  step.value++;
};

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
