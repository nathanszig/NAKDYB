<template>
  <div class="flex">
    <div class="w-full h-screen border-4 border-admin border-solid">
      <!-- TITLE -->
      <div class="h-1/2 flex justify-center items-center">
        <h2 class="font-black text-2xl text-admin">Game Master</h2>
      </div>
      <!-- BUTTON -->
      <div class="h-1/2 flex justify-center items-center">
        <NuxtLink to="/create">
          <Button name="Create a game" />
        </NuxtLink>
      </div>
    </div>
    <div class="w-full h-screen border-4 border-player border-solid">
      <!-- TITLE -->
      <div class="h-1/2 flex justify-center items-center">
        <h2 class="font-black text-2xl text-player">Player</h2>
      </div>
      <!-- BUTTON -->
      <div class="h-1/2 flex justify-center items-center">
        <NuxtLink to="/play">
          <Button name="Join a game" :isPlayer="true" />
        </NuxtLink>
      </div>
    </div>
  </div>
</template>
