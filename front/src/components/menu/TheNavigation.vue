<template> 
  <header>
    <nav >
      <div class="container-user">
            <i class="far fa-user-circle"></i>
            <div class="username">
              <h2>{{}} Group 1</h2>
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

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><router-link to="/home" >Home</router-link></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-myevent" aria-selected="false"><router-link to="/myevent" >My event</router-link></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-findevent" aria-selected="false"><router-link to="/findevent" >Find event</router-link></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-categories" aria-selected="false"><router-link to="/categories" >Category</router-link></a>
        </li>
      </ul>

    </nav>
  </header>
</template>

<script>
export default {
  emits: ["sign-out"],
  data(){
    return{
      signOut: false,
    }
  },
  methods: {
    signout(){
      this.$emit("sign-out", this.signOut);
      let username = localStorage.getItem('username').toString();
      console.log(username);
      localStorage.clear();
    }
  },
}
</script>

<style scoped>

header {
  position: sticky;
  margin-top: -10px;
  width: 100%;
  height: 4rem;
  background-color:#000;
  margin: 0;
  padding: 0;
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


ul {
  list-style: none;
  height: 60px;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
ul li{
  padding:0px 20px;
}
ul li a {
  text-decoration: none;
  text-transform: uppercase;
  color: #fff;
}

#btnSignout{
  border: none;
  background: none;
  font-size: 18px;
  text-decoration: none;
}

</style>
