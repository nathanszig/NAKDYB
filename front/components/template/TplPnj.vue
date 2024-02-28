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
  <section class="tpl-pnj">
    <h2>PNJ of the game</h2>
    <TableText :table="table"/>
  </section>
</template>

<style lang="scss" scoped>
.tpl-pnj {
  text-align: center;
}
</style>
