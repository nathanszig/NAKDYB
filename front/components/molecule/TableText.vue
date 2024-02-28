<script setup>
defineProps({
  // Contenu du tableau
  table: {
    type: Array,
    required: true
  },
})
</script>

<template>
  <ul :class="`table-text`" v-for="content in table">
    <li>
      <div>
        <p>{{ content.title }}</p>
        <span>{{ content.description }}</span>
      </div>
      <Button type="checkbox"/>
    </li>
  </ul>
</template>

<style scoped lang="scss">
.table-text {
  li{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--blue-900);
    div {
      display: flex;
      flex-direction: column;
      color: var(--white-100);
      padding: 25px 40px;
      p {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 20px;
      }
      span {
        font-size: 14px;
      }
    }
  }
  &:nth-child(odd) {
    background-color: var(--blue-700);
  }
}
</style>
