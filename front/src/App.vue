<template>
  <section>
    <the-navigation v-if="isNotMenu"></the-navigation>
    <router-view @signin-user = "notMenu"></router-view>
  </section>
</template>

<script>
import TheNavigation from './components/menu/TheNavigation.vue';
export default {
  components: {
    TheNavigation,
  },
  data() {
    return{
      isNotMenu: false,
    }
  },
  methods: {
    notMenu(signin) {
      this.isNotMenu = signin
    }
  },
};
</script>
<style>
  body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
  }
</style>

