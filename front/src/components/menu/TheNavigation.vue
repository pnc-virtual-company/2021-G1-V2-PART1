<template>    
  <header>
    <nav>
      <div class="container">
            <div class="circle"><i class="far fa-user-circle"></i></div>
            <div class="username">
              <h3>Username</h3>
            </div>
      </div>
      
      <div >
        <div>
            <h2>Sing out</h2>
        </div>
        <div class="signout">
          <i class="fal fa-sign-out"></i>
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

<style >


body {
  margin:0;
  padding:0;
  font-family: sans-serif;
}
header {
  width: 100%;
  height: 4rem;
  background-color: #272221;
}
.container {
  float: left;
}
/* .circle {
  float: left;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #ffff;
  align-items: center;
  margin-top: 8px;
  margin-left: 20px;
} */
.far {
  font-size: 50px;
  color: #ffff;
  float: left;
  align-items: center;
  margin-top: 8px;
  margin-left: 20px;
}
.username {
  color: rgb(255, 255, 255);
  margin-top: 25px;
  margin-left: 80px;
  align-items: center;
 
}
.signout {
  color: rgb(255, 255, 255);
  font-size: 25px;
  float: right;
  padding: 10px;
  margin-top: 10px;
  
}
h2 {
  color: aliceblue;
  float: right;
  font-size: 15px;
  text-transform: uppercase;
  margin-top: 25px;
  margin-right: 10px;
}


/* .button-sign {
  background: none;

} */

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
  
}
.search-box:hover > .search-txt {
  width: 100px;
  padding: 0 6px;
  
}
.search-btn {
  color: #c73916;
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

li {
  
  margin: 10px;
}

a {
  text-decoration: none;
  text-transform: uppercase;
  background: transparent;
  border: 1px solid transparent;
  cursor: pointer;
  color: white;
  padding: 0.5rem 1.5rem;
  display: inline-block;
}
a:hover {
  color: rgb(0, 0, 0);
  
  background: rgb(180, 178, 178);
  height: 20px;
  border: none;
  border-radius: 50px;
}


</style>
