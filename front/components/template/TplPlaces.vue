<script setup>
defineProps({
  // Table contents
  table: {
    type: Array,
    required: true
  },
})
</script>

<template>
  <section class="tpl-places">
    <h2>Places of the game</h2>
    <TableText :table="table"/>
  </section>
</template>

<style lang="scss" scoped>
.tpl-places {
  text-align: center;
}
</style>
