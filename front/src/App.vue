<template>
  <section>
    <the-navigation @sign-out="Signout" v-if="isNotMenu" @user-profile = "ShowProfile" @find-event="Findevent"></the-navigation>
    <div class="content">
      <profile v-if="profile"></profile>
      <router-view v-if="isFindevent" @signin-user = "notMenu" @new-user = "signup" :closeEvent="eventLists" @other-event="getEvent"></router-view>

      <!-- =============Find event component======== -->
      <div class="event" v-if = "findEvent">
        <h2 id="findEvent">Find event</h2>
        <div id="searchbtn">
          <label for="search-title">Search title</label>
          <input v-on:keyup = "search" type="search" placeholder="search event to join..." v-model= "searchevent" class="eventsearch">
          <label for="search-country">Search city</label>
          <input v-on:keyup = "searchCity" type="search" placeholder="search city.." v-model= "searchCityName">
        </div>
        <div class="main_card">
          <ul>
            <find-event 
              v-for="event of eventLists"
              :key="event.id"
              :Event="event"
            ></find-event>
          </ul>
        </div>
        
      </div>

    </div>
  </section>
</template>

<script>
import TheNavigation from './components/menu/TheNavigation.vue';
import findEvent from './components/ui/Findevent.vue';
import Profile from './view/Profile.vue';
import axios from './axios-http.js';

export default {
  components: {
    TheNavigation,
    Profile,
    findEvent
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
      userid:"",
      searchCityName: '',
    }
  },
  methods: {
    Findevent(findevent){
      this.isFindevent = findevent;
      this.findEvent = !findevent ;
    },
    getEvent(events){
      console.log(events);
      this.getAllEvent();
    },

    getAllEvent(){
      axios.get("events").then(res => {
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
          axios.get("events/search/" + this.searchevent).then(res => {
            this.eventLists = [];
            for(let event of res.data){
              if(event.user_id != this.userid){
                this.eventLists.push(event);
              }
            }
        })
      }else{
        this.getAllEvent();
      }     
    },
    searchCity(){
      if(this.searchCityName !== ""){
        axios.get("events/searchCity/" + this.searchCityName).then(res => {
          this.eventLists = [];
          for(let event of res.data){
            if(event.user_id != this.userid){
              this.eventLists.push(event);
            }
          }
        })
      }else{
        this.getAllEvent();
      }
    },
    ShowProfile(profile){
      this.profile = profile
    },

    notMenu(action) {
      this.isNotMenu = action
    },
    Signout(actions) {
      this.isFindevent = !actions
      this.profile = actions;
      this.findEvent = actions;
      this.profile = actions;
      this.isNotMenu = actions;
    },
    signup(signup){
      this.isNotMenu = signup;
    }
  },
  mounted() {
    this.getAllEvent();
    this.userid = localStorage.getItem('userID');
    if(this.userid !== null ){
      this.isNotMenu = true;
      this.$router.push('/home');
    }
  },
};
</script>

<style scoped>
  #findEvent{
    margin-top: 2%;
    margin-left: 24%;
    color: #fff;
  }
  label{
    color: #fff;
  }
  #searchbtn{
    margin-top: 1%;
    margin-bottom: 2%;
    width: 60%;
    margin-left: 20%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
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
    width: 25%;
    border: 1px solid rgb(172, 160, 160);
    outline: none;
    border-radius: 20px;
    padding: 5px 10px;
  }
  .event{
    width: 100%;
    background-image: url('./assets/findevent_bg.jpg');
    background-size: cover;
  }
  .main_card{
    height: 67.8vh;
    overflow-y: scroll;
  }
  ul{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    width: 60%;
    margin-left: 20%;
  }
</style>

