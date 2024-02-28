<script setup>
defineProps({
  // Find out if the painting is in edition
  isEdit: {
    type: Boolean,
    required: false,
    default: false,
  },
});

// Table contents
const table = defineModel();
const maxStatsPoints = 20;
const statsPoints = computed(() => {
  return table.value.physical + table.value.mental + table.value.social;
});

// Increment the number
const incrementNumber = (key) => {
  table.value[key]++;
};

// Decrement the number
const decrementNumber = (key) => {
  table.value[key]--;
};
</script>

<template>
  <ul :class="`table-number-player`" v-for="(item, key) in table" :key="key">
    <li class="h-20">
      <p>{{ key }}</p>
      <div>
        <div v-if="isEdit && item > 0">
          <button @click="decrementNumber(key)" class="w-5">-</button>
        </div>
        <span class="w-10 text-center">{{ item }}</span>
        <div class="w-5">
          <button
            v-if="isEdit && item < 10 && statsPoints < maxStatsPoints"
            @click="incrementNumber(key)"
          >
            +
          </button>
        </div>
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
      span,
      button {
        font-size: 30px;
      }
    }
  }
  &:nth-child(odd) {
    background-color: var(--orange-700);
  }
}
</style>
