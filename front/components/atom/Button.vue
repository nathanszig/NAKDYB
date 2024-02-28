<script setup lang="ts">
defineProps({
  // Type du bouton
  type: {
    type: String,
    required: false,
    default: 'button'
  },
  // Nom du bouton
  name: {
    type: String,
    required: false,
    default: ''
  },
  // Si le remplir est obligatoire
  isRequired: {
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
  <input :class="`bouton ${isPlayer ? 'player' : 'admin'} ${isActive ? 'active' : ''}`" :type="type" :value="name" :required="isRequired" data-on="Selected" data-off="Choice"/>
</template>

<style scoped lang="scss">
.bouton{
  background-color: var(--black-700);
  // Style du bouton en type text
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
  // Style du bouton en type button
  &[type='button']{
    width: 230px;
    height: 62px;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    // Si c'est le maitre du jeu
    &.admin{
      border: 1px solid var(--blue-500);
      color: var(--blue-500);
      &.active, &:hover{
        background-color: var(--blue-500);
        color: var(--white-100);
        filter: drop-shadow(0 0 0.75rem var(--blue-500));
      }
    }
    // Si c'est le joueur
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
  // Style du bouton en type checkbox
  &[type='checkbox']{
    appearance: none;
    display: inline-flex;
    margin: 0;
    &:before{
      padding: 2rem;
      width: 10rem;
      text-align: center;
      box-sizing: border-box;
      background-color: var(--black-700);
      border: 1px solid var(--blue-500);
      color: var(--blue-500);
      content: attr(data-off);
      cursor: pointer;
      transition: all 0.1s cubic-bezier(0.25, 0.25, 0.75, 0.75);
    }
    &:checked::before {
      background-color: var(--blue-500);
      color: var(--white-100);
      content: attr(data-on);
      filter: drop-shadow(0 0 0.75rem var(--blue-500));
    }
  }
}
</style>
