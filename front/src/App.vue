<template>
  <section>
    <the-navigation @sign-out = "signout" v-if="isNotMenu" @user-profile = "ShowProfile" @find-event="Findevent" @notfind-event="NotFind"></the-navigation>
    <div class="content">
      <profile v-if="profile"></profile>
      <router-view v-if="isFindevent" @signin-user = "notMenu" @new-user = "signup" :closeEvent="eventLists"></router-view>

      <!-- ============Find event============= -->
      <div class="event" v-if = "findEvent">
        <input id="search" type="search" placeholder="search event to join...">
      <ul>
        <findEvent-card  
          v-for="event of eventLists"
          :key="event.id"
          :Event="event"
        ></findEvent-card>
      </ul>

    </div>

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
      
    },
    NotFind(findevent){
      this.isFindevent = findevent;
      this.findEvent = !findevent;
      // this.$emit('close-findEvent', this.findEvent);
      
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
  input[type=search]{
    border: 1px solid rgb(172, 160, 160);
    outline: none;
    border-radius: 20px;
    margin-top: 3%;
    padding: 5px 10px;
    margin-left: 500px;
  }
  .event{
    width: 100%;

  }
  ul{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    height: 77vh;
    overflow-y: scroll;
  }
</style>

