<script setup>
const table = [
  {
    title: 'Lorem',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing',
    isSelected: true
  },
  {
    title: 'Lorem',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing',
    isSelected: false
  },
  {
    title: 'Lorem',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing',
    isSelected: false
  },
  {
    title: 'Lorem',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing',
    isSelected: false
  }
]

const stats = ref({
  health: 0,
  strenght: 10,
  speed: 5,
  smart: 6,
  chance: 5,
});
</script>

<template>
  <Button name="test"/>
  <TableText :table="table"/>
  <TableNumberPlayer v-model="stats" />
</template>

<style scoped>

</style>
