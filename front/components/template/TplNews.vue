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
  <section class="tpl-news">
    <h2>News of the game</h2>
    <TableText :table="table" />
  </section>
</template>

<style lang="scss" scoped >
.tpl-news{
  text-align: center;
}
</style>
