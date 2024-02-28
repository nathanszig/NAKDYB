<script setup lang="ts">
defineProps({
  // Table contents
  table: {
    type: Array,
    required: true
  },
  // All features
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
  <table class="table-number-game-master">
    <tr>
      <th></th>
      <th v-for="title in features">{{ title }}</th>
    </tr>
    <tr v-for="content in table">
      <td>{{content.name}}</td>
      <td>{{ content.physical }}</td>
      <td>{{ content.mental }}</td>
      <td>{{ content.social }}</td>
    </tr>
  </table>
</template>

<style scoped lang="scss">
.table-number-game-master{
  color: var(--white-100);
  tr{
    background-color: var(--blue-900);
    &:nth-child(odd) {
      background-color: var(--blue-700);
    }
    th{
      padding: 10px 0;
      text-transform: uppercase;
      font-size: 20px;
      font-weight: bold;
      width: 110px;
      border-right: 1px solid var(--blue-500);
    }
    td{
      padding: 10px;
      font-size: 20px;
      font-weight: bold;
      border-right: 1px solid var(--blue-500);
    }
  }
}
</style>
