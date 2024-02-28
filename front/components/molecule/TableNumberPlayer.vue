<script setup>
defineProps({
  // Find out if the painting is in edition
  isEdit: {
    type: Boolean,
    required: false,
    default: false
  }
})

// Table contents
const table = defineModel()

// Increment the number
const incrementNumber = (key) => {
  table.value[key]++
}

// Decrement the number
const decrementNumber = (key) => {
  table.value[key]--
}
</script>

<template>
  <ul :class="`table-number-player`" v-for="(item, key) in table" :key="key">
    <li>
      <p>{{ key }}</p>
      <div>
        <button v-if="isEdit && item > 0" @click="decrementNumber(key)">-</button>
        <span>{{ item }}</span>
        <button v-if="isEdit && item < 10" @click="incrementNumber(key)">+</button>
      </div>
    </li>
  </ul>
</template>

<style scoped lang="scss">
.table-number-player {
  li {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--orange-900);
    padding: 25px 40px;
    p {
      font-weight: bold;
      font-size: 20px;
      text-transform: capitalize;
    }
    div {
      display: flex;
      align-items: center;
      color: var(--white-100);
      span {
        margin: 0 20px;
      }
      span, button {
        font-size: 30px;
      }
    }
  }
  &:nth-child(odd) {
    background-color: var(--orange-700);
  }
}
</style>
