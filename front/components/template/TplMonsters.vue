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
  <section class="tpl-monsters">
    <h2>Monsters of the game</h2>
    <TableText :table="table" />
  </section>
</template>

<style lang="scss" scoped >
.tpl-monsters{
  text-align: center;
}
</style>
