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
        <div>
            <h2 class="signOut"><router-link v-bind:to="'/signin'" >Sign Out</router-link></h2>
        </div>
        <div class="signout">
       
        </div>
        
      </div>
      <div class="search-box">
          <input class="search-txt"  type="text" name="" placeholder="Type to search...">
          <i class="fas fa-search search-btn"></i>
      </div>
      
      <ul>
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


</script>



<style >

header {
  margin-top: -10px;
  width: 100%;
  height: 4rem;
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
  margin-top: 8px;
  margin-left: 10px;
 
}
.username {
  color: rgb(255, 255, 255);
  
  margin-left: 70px;
  align-items: center;
 
}
.signout {
  display: flex;
  align-items: center;
  border-left: 2px solid white;
  height: 1vh;
  color: rgb(255, 255, 255);
  font-size: 25px;
  float: right;
  padding: 10px;
  margin-top: 20px;
}
h2 {
  color:#fff;
  float: right;
  font-size: 15px;
  text-transform: uppercase;
  margin-top: 25px;
  margin-right: 10px
}

.signOut a{
  color: rgb(212, 22, 22);
  margin-left: -15%;
}
.signOut a:hover{
  color: rgb(179, 83, 83);
  text-decoration: underline;
}

.search-box {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  float: right;
  background: #2f3640;
  height: 15px;
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
  color: #ffffff;
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
  height: 100%;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
ul li {
  margin: 0;
  padding: 0;
}
li a{
  margin: 10px;
  text-decoration: none;
  text-transform: uppercase;
  background: transparent;
  border: 1px solid transparent;
  cursor: pointer;
  color: white;
  padding: 0.5rem 1.5rem;
  display: inline-block;
}

ul li:hover {
  color: rgb(0, 0, 0);
  background: rgba(101, 194, 78, 0.582);
  height: 66px;
  display: flex;
  justify-content: center;
  align-items: center;
}


</style>
