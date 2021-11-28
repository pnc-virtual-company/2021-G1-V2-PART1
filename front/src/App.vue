<template>
  <section>
    <the-navigation></the-navigation>
    <router-view></router-view>
  </section>
</template>

<script>
import TheNavigation from './components/menu/TheNavigation.vue';

export default {
  components: {
    TheNavigation,
  },
  data() {
    return {
      users: [
        { id: 'u1', fullName: 'Ronan OGOR', role: 'The king' },
        { id: 'u2', fullName: 'Him Hey', role: 'The Queen' },
        { id: 'u3', fullName: 'Rady Y', role: 'The API emperor' },
        { id: 'u4', fullName: 'Sovanda', role: 'The VUE magician' },
      ],
    };
  },
  provide() {
    return {
      teams: this.teams,
      users: this.users,
    };
  },
};
</script>