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


const features = ["physical", "mental", "social"]

const tableMember = [
  {
    id: 0,
    name: "Karen",
    role: "string",
    physical: 5,
    mental: 2,
    social: 0,
  },
  {
    id: 0,
    name: "Nathan",
    role: "string",
    physical: 8,
    mental: 2,
    social: 10,
  },
  {
    id: 0,
    name: "Benji",
    role: "string",
    physical: 0,
    mental: 1,
    social: 6,
  },
]
</script>

<template>
  <Button name="test"/>
  <TableText :table="table"/>
  <TableNumberPlayer v-model="stats" />
  <TableNumberGameMaster :features="features" :table="tableMember" />
</template>

<style scoped>

</style>
