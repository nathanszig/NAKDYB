<script setup lang="ts">
defineProps({
  type: {
    type: String,
    required: false,
    default: 'button'
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
  // Savoir si c'est un player ou un admin
  isPlayer: {
    type: Boolean,
    required: false,
    default: false
  },
  // Savoir si l'état du bouton est actif ou non pour changer la css
  isActive: {
    type: Boolean,
    required: false,
    default: false
  },
})

</script>

<template>
  <input :class="`bouton ${isPlayer ? 'player' : 'admin'} ${isActive ? 'active' : ''}`" :type="type" :value="name" :required="required"/>
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
    width: 230px;
    height: 62px;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    &.admin{
      border: 1px solid var(--blue-500);
      color: var(--blue-500);
      &.active, &:hover{
        background-color: var(--blue-500);
        color: var(--white-100);
        filter: drop-shadow(0 0 0.75rem var(--blue-500));
      }
    }
    &.player{
      border: 1px solid var(--orange-500);
      color: var(--orange-500);
      &.active, &:hover{
        background-color: var(--orange-500);
        color: var(--white-100);
        filter: drop-shadow(0 0 0.75rem var(--orange-500));
      }
    }
    &:hover{
      cursor: pointer;
    }
  }
}
</style>
