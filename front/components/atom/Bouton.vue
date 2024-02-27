<script setup lang="ts">
defineProps({
  type: {
    type: String,
    required: false,
    default: 'text'
  },
  name: {
    type: String,
    required: true,
  },
  required: {
    type: Boolean,
    required: false,
    default: false
  },
  color: {

  }
})

</script>

<template>
  <input class="bouton" :type="type" :name="name" :required="required"/>
</template>

<style scoped lang="scss">
.bouton{
  background-color: var(--black-700);
  &[type='text']{
    border: 1px solid var(--orange-500);
    font-size: 32px;
    color: var(--white-100);
    text-align: center;
    padding: 18px;
    &:focus-visible, &:focus{
      outline: none;
    }
  }
  &[type='button']{

  }

}
</style>
