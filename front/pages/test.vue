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
</script>

<template>
<Button name="test" />
  <TableText :table="table" />
</template>

<style scoped>

</style>
