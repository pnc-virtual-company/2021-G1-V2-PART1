<template>
  <section>
    <the-navigation @sign-out = "signout" v-if="isNotMenu" @user-profile = "ShowProfile"></the-navigation>
    <div class="content">
      <profile v-if="profile"></profile>
      <router-view @signin-user = "notMenu" @new-user = "signup"></router-view>
    </div>
   

  </section>
</template>

<script>
import TheNavigation from './components/menu/TheNavigation.vue';
import Profile from './components/menu/Profile.vue';
export default {
  components: {
    TheNavigation,
    Profile
  },

  data() {
    return{
      isNotMenu: false,
      profile: false,
    }
  },
  methods: {

    ShowProfile(profile){
      this.profile = profile
      console.log(profile); 
    },

    notMenu(action) {
      this.isNotMenu = action
      console.log(this.isNotMenu);
    },
    signout(actions) {
      this.isNotMenu = actions
    },
    signup(signup){
      this.isNotMenu = signup;
      console.log(this.isNotMenu);
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
  .content{
    display: flex;
  }
</style>

