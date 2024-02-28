<template>
  <div class="border-4 border-solid border-player min-h-screen flex flex-col">
    <div class="flex justify-center items-center p-32">
      <h2 class="font-black text-2xl text-player">PLAYER</h2>
    </div>
    <div class="relative w-full max-w-sm mx-auto p-10 flex flex-col flex-1">
      <slot />
    </div>
  </div>
</template>
