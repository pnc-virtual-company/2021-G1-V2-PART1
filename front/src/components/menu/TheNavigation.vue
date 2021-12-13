<template> 
  <header>
    <nav >
      <div class="container-user">
            <div class="img">
              <img id="image" @click = "Profile"  class="img-1" :src="url + username.profile" alt="">
            </div>
    
            <div class="username">
              <h2>{{username.name}}</h2>
            </div>
      </div>
      
      <div >
      <div id="signout">
          <button id="btnSignout" @click="signout" ><router-link v-bind:to="'/'" >sign out</router-link></button>
      </div>
        
      </div>
      <ul>
        <li>
          <router-link @click="notFindevent" to="/home" >Home</router-link>
        </li>
        <li>
          <router-link @click="notFindevent" to="/myevent" >My event</router-link>
        </li>
        <li>
          <router-link @click="Findevent" to="/findevent" >Find event</router-link>
        </li>
        <li>
          <router-link @click="notFindevent" to="/categories" >Category</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>


<script>
import axios from 'axios';
const API_URL = 'http://127.0.0.1:8000/api/users';
export default {
  emits: ['user-profile','sign-out','find-event'],
  data(){
    return{
      signOut: false,
      username: "",
      displayprofile: false,
      isFindevent: false,
      findevent: true,
      url : 'http://127.0.0.1:8000/storage/imageUser/',
    }
  },
  methods: {
    signout(){
      this.$emit("sign-out", this.signOut);
      localStorage.clear();
    },
    Profile() {
      this.displayprofile = !this.displayprofile;
      this.$emit('user-profile',this.displayprofile);
    },
    Findevent(){
      this.$emit('find-event',this.isFindevent);
    },
    notFindevent(){
      this.$emit('find-event',this.findevent);
    }
  },
  mounted() {
    let userid = localStorage.getItem('userID');
    axios.get(API_URL).then(res => {
        let users = res.data;
        for(let user of users){
          if(user.id == userid){
            this.username = user;
          }
        }
      })
  },
}
</script>

<style scoped>
body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}

img{
  margin-top: 10%;
  width: 50px;
  height: 50px;
  border-radius: 360px;
  cursor: pointer;
}
header {
  position: sticky;
  top: 0;
  width: 100%;
  background-color:rgb(0, 0, 0);
  margin-bottom: -15px;
}
.container-user {
  display: flex;
  margin-left: 1%;
  float: left;
}

.far {
  font-size: 50px;
  color: #ffff;
  float: left;
  align-items: center;
  margin-top: 5px;
  margin-left: 10px;
}
#profile{
  border: none;
  background: none;
  outline: none;
  cursor: pointer;
}
.username {
  color: rgb(255, 255, 255);
  margin-left: 10px;
  align-items: center;
}
#signout {
  display: flex;
  align-items: center;
  border-left: 2px solid white;
  height: 1vh;
  color: rgb(255, 255, 255);
  float: right;
  padding: 10px;
  margin-top: 20px;
  margin-right: 1%;
}
h2 {
  color:#fff;
  float: right;
  font-size: 17px;
  text-transform: uppercase;
  margin-top: 22px;
  margin-right: 10px
}

nav {
  background: rgb(0, 0, 0);
}
ul {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 10vh;
}
ul li{
  list-style: none;
}
nav a {
  color: #fff;
  margin-left: 10px;
  text-decoration: none;
  padding: 1rem;
  text-transform: uppercase;
}
.router-link-active {
  background: teal;
  border-radius: 2px;
}

#btnSignout{
  border: none;
  background: none;
  font-size: 13px;
  text-decoration: none;
}
#btnSignout:hover{
  color: rgb(50, 50, 207);
  text-decoration: underline;
}
ul li a{
  font-size: 13px;
}
</style>
