<script setup lang="ts">
defineProps({
  // Table contents
  player: {
    type: Array,
    required: true
  },
  features: {
    type: Array,
    required: true
  },
  // Know if it's a player or an admin
  isPlayer: {
    type: Boolean,
    required: false,
    default: false
  },
})
</script>

<template>

</template>

<style scoped lang="scss">

</style>
