<script setup>
const step = defineModel()

/* Function to move to the next step */
const nextStep = () => {
  step.value++;
};

/* Function to move to the before step */
const beforeStep = () => {
  step.value--;
};
</script>

<template>
  <div class="container-btn">
    <Button class="before" v-if="step !== 0" name="Before" @click="beforeStep"/>
    <Button class="after" name="After" is-active @click="nextStep"/>
  </div>
</template>

<style scoped lang="scss">
.container-btn{
  position: absolute;
  bottom: 70px;
  left: 50%;
  transform: translateX(-50%);
  .before{
    margin-right: 88px;
  }
}
</style>
