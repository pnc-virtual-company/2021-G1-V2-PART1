<template> 
  <header>
    <nav >
      <div class="container-user">
            <i class="far fa-user-circle"></i>
            <div class="username">
              <h2>{{username}}</h2>
            </div>
      </div>
      
      <div >
      <div id="signout">
          <button id="btnSignout" @click="signout" ><router-link v-bind:to="'/'" >sign out</router-link></button>
      </div>
        
      </div>
      <div class="search-box">
          <input class="search-txt"  type="text" name="" placeholder="Type to search...">
          <i class="fas fa-search search-btn"></i>
      </div>

      <ul>
        <li>
          <router-link to="/home" >Home</router-link>
        </li>
        <li>
          <router-link to="/myevent" >My event</router-link>
        </li>
        <li>
          <router-link to="/findevent" >Find event</router-link>
        </li>
        <li>
          <router-link to="/categories" >Category</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>

import axios from 'axios';
const API_URL = 'http://127.0.0.1:8000/api/users';
export default {
  emits: ["sign-out"],
  data(){
    return{
      signOut: false,
      username: "",
    }
  },
  methods: {
    signout(){
      this.$emit("sign-out", this.signOut);
      localStorage.clear();
    }
  },
  mounted() {
    let userid = localStorage.getItem('userID');
    axios.get(API_URL).then(res => {
        let users = res.data;
        for(let user of users){
          if(user.id == userid){
            this.username = user.name;
            console.log(user.name);
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
header {
  position: sticky;
  top: 0;
  width: 100%;
  background-color:#000;
}
.container-user {
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
.username {
  color: rgb(255, 255, 255);
  margin-left: 70px;
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



.search-box {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  float: right;
  background: #475161;
  height: 30px;
  border-radius: 50px;
  padding: 10px;
  margin-top: 15px;
  margin-right: 20px;
  margin-right: 10px;
  
}
.search-box:hover > .search-txt {
  width: 100px;
  padding: 0 6px;
  
}
.search-btn {
  color: #fff;
  height: 15px;
  width: 15px;
  line-height: 15px;
  font-size: 15px;
  
}
.search-txt {
  border: none;
  background: none; 
  outline: none;
  padding: 0;
  color: white;
  font-size: 12px;
  transition: 0.4s;
  line-height: 20px;
  width: 0px;
  
}
nav {
  background: #000;
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
  font-size: 15px;
  /* background: red; */
  text-decoration: none;
}
#btnSignout:hover{
  color: rgb(50, 50, 207);
  text-decoration: underline;
}

</style>
