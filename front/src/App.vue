<template>
  <section>
    <the-menu></the-menu>
    <router-view></router-view>
  </section>
</template>
<script>
// import TheNavigation from './components/menu/TheNavigation.vue';

export default {
  components: {
    // TheNavigation,
  },
  data() {
    return {
      activePage: 'teams-list',
      teams: [
        { id: 't1', name: 'Frontend Engineers', members: ['u1', 'u2'] },
        { id: 't2', name: 'Backend Engineers', members: ['u1', 'u2', 'u3'] },
        { id: 't3', name: 'Dream Team', members: ['u4', 'u1'] },
      ],
      users: [
        { id: 'u1', fullName: 'Ronan OGOR', role: 'The king' },
        { id: 'u2', fullName: 'Him Hey', role: 'The Queen' },
        { id: 'u3', fullName: 'Rady Y', role: 'The API emperor' },
        { id: 'u4', fullName: 'Sovanda', role: 'The VUE magician' },
      ],
    };
  },
}
</script>



