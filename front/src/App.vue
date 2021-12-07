<template>
  <section>
    <the-navigation @sign-out = "signout" v-if="isNotMenu"></the-navigation>
    <router-view @signin-user = "notMenu"></router-view>
    <user-profile v-if = "profile"></user-profile>
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
      profile: false,
    }
  },
  methods: {
    notMenu(action) {
      this.isNotMenu = action
      console.log(this.isNotMenu);
    },
    signout(actions) {
      this.isNotMenu = actions
    }
  },
  mounted() {
    let username = localStorage.getItem('userID');
    if(username !== null ){
      this.isNotMenu = true;
      this.$router.push('/home');
    }
  },
};
</script>
<style scoped>
  body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
  }
</style>

