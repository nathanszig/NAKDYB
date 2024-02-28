<script setup>
defineProps({
  gameId: {
    type: Number,
    required: true
  }
})
</script>

<template>
  <section class="tpl-players">
    <h2>Connection to the game</h2>
    <h3>Part code</h3>
    <Button class="code" :name="gameId" isActive is-player/>
    <h2>Players of the game</h2>
    <TableNumberGameMaster/>
  </section>
</template>

<style scoped lang="scss">
.tpl-players {
  text-align: center;
  .code {
    pointer-events: none;
    margin-bottom: 70px;
    font-size: 30px;
  }
}
</style>
