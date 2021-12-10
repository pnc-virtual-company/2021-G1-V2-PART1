<template>
  <section>
    <the-navigation @sign-out = "signout" v-if="isNotMenu" @user-profile = "ShowProfile" @find-event="Findevent"></the-navigation>
    <div class="content">
      <profile v-if="profile"></profile>
      <router-view v-if="isFindevent" @signin-user = "notMenu" @new-user = "signup" :closeEvent="eventLists"></router-view>

      <!-- =============Find event component======== -->
      <div class="event" v-if = "findEvent">
        <input v-on:keyup = "search" type="search" placeholder="search event to join..." v-model= "searchevent">
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
      events: null,
      eventLists: [],
      eventName: "",
      searchevent:"",
      eventInfo: "",
      userid:""
      
    }
  },
  methods: {
    Findevent(findevent){
      this.isFindevent = findevent;
      this.findEvent = !findevent ;
    },
    getEvent(){
      axios.get(API_URL).then(res => {
        this.eventLists = [];
        for(let event of res.data){
          if(event.user_id != this.userid){
            this.eventLists.push(event);
          }
        }

        
      })
    },
    search(){
      if(this.searchevent !== ""){
          axios.get(API_URL + "/search/" + this.searchevent).then(res => {
            this.eventLists = [];
            for(let event of res.data){
              if(event.user_id != this.userid){
                this.eventLists.push(event);
              }
            }
        })
      }else{
          this.getEvent();
      }
            
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
    this.userid = localStorage.getItem('userID');
    if(this.userid !== null ){
      this.isNotMenu = true;
      this.$router.push('/home');
    }
  },
};
</script>

<style scoped>
  input[type=search]{
    border: 1px solid rgb(1, 112, 156);
    outline: none;
    margin-left: 67%;
    border-radius: 10px;
    padding:5px 10px;
    margin-top: 2%;
    background: rgb(202, 233, 248);
    color: rgb(10, 5, 1);
    text-align: center;
    
  }
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

