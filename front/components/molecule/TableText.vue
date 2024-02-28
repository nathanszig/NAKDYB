<script setup>
defineProps({
  // Contenu du tableau
  table: {
    type: Array,
    required: true
  },
  // Savoir si c'est un player ou un admin
  isPlayer: {
    type: Boolean,
    required: false,
    default: false,
  },
})
</script>

<template>
<ul class="table-text" v-for="content in table">
  <li>
    <div>
      <p>{{content.title}}</p>
      <span>{{content.description}}</span>
    </div>
    <Button :isPlayer="isPlayer" type="checkbox"/>
  </li>
</ul>
</template>

<style scoped lang="scss">
.table-text{

}
</style>
