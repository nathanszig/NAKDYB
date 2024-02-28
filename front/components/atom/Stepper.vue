<template>
  <div class="flex mx-10 text-white">
    <div
      v-for="(s, index) in steps"
      :key="index"
      class="flex items-center relative"
      :class="{ 'flex-1': index > 0 }"
    >
      <!-- Separator -->
      <div v-if="index > 0" class="h-0.5 flex-1 bg-admin-20" />

      <!-- Bubble -->
      <div
        class="m-1 w-8 h-8 rounded-full flex items-center justify-center font-semibold"
        :class="index <= step ? 'bg-admin' : 'bg-admin-20'"
      >
        <p :class="{ 'opacity-20': index > step }">
          {{ index + 1 }}
        </p>
        <!-- <Icon v-else name="check" color="black" class="w-4 h-4" /> -->
      </div>

      <!-- Label -->
      <p
        v-if="index <= step"
        class="absolute -bottom-4 right-5 transform translate-x-1/2 text-sm font-semibold"
        :class="index == step ? '' : 'opacity-20'"
      >
        {{ s }}
      </p>
    </div>
  </div>
</template>

<script>
export default defineComponent({
  props: {
    steps: { type: Array, required: true },
    step: { type: Number, required: true },
  },
});
</script>
