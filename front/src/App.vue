<template>
  <section>
    <the-navigation @sign-out = "signout" v-if="isNotMenu" @user-profile = "ShowProfile" @find-event="Findevent"></the-navigation>
    <div class="content">
      <profile v-if="profile"></profile>
      <router-view v-if="isFindevent" @signin-user = "notMenu" @new-user = "signup"></router-view>
    </div>

    <div class="event" v-if = "findEvent">
      <ul>
        <findEvent-card
          v-for="event of eventLists"
          :key="event.id"
          :Event="event"
        ></findEvent-card>
      </ul>
    </div>
   

  </section>
</template>

<script>
import TheNavigation from './components/menu/TheNavigation.vue';
import Profile from './components/menu/Profile.vue';
import axios from 'axios';
const API_URL = 'http://127.0.0.1:8000/api/events';
export default {
  components: {
    TheNavigation,
    Profile
  },

  data() {
    return{
      isNotMenu: false,
      profile: false,
      isFindevent: true,
      findEvent: false,
      eventLists: [],
    }
  },
  methods: {
    Findevent(findevent){
      this.isFindevent = findevent;
      this.findEvent = !findevent ;
      console.log(this.isFindevent + " " + this.findEvent);
    },
    
    getEvent(){
      axios.get(API_URL).then(res => {
        this.eventLists = res.data;
      })
    },

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
    this.getEvent();
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

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  html {
    font-family: "Jost", sans-serif;
  }

  ul{
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    align-items: center;
    width: 80%;
    margin-left: 10%;
    margin-top: 5%;
  }
</style>

