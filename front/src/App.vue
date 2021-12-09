<template>
  <section>
    <the-navigation @sign-out = "signout" v-if="isNotMenu" @user-profile = "ShowProfile" @find-event="Findevent"></the-navigation>
    <div class="content">
      <profile v-if="profile"></profile>
      <router-view v-if="isFindevent" @signin-user = "notMenu" @new-user = "signup"></router-view>
    </div>

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
      eventName: "",
      searchevent:"",
      eventInfo: "",
    }
  },
  methods: {
    Findevent(findevent){
      this.isFindevent = findevent;
      this.findEvent = !findevent ;
      this.eventInfo = findevent;
      console.log(this.isFindevent + " " + this.findEvent + "" + this.eventInfo);
    },
    
    getEvent(){
      axios.get(API_URL).then(res => {
        this.eventLists = res.data;
        this.eventName = "";
        this.searchevent = "";
        this.eventInfo = "";
      })
    },
    search(){
            let myID = localStorage.getItem('userID');
            if(this.searchevent !== ""){
                axios.get(API_URL + "/search/" + this.searchevent).then(res => {
                  let allevents = res.data;
                  this.eventLists = [];
                  console.log(allevents);
                  for(let event of allevents){
                    if(event.user_id !== myID){
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
    let username = localStorage.getItem('userID');
    if(username !== null ){
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

  ul{
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    align-items: center;
    width: 70%;
    margin-left: 15%;
    margin-top: 2%;
  }
</style>

