<template>
    <div class="profile">
        <div class="container-profile">
            <div class="blog-profile">
              <img :src="url + userInfo.profile" alt="">
            </div>

            <form action="#">
                <h4 class="blog-info">Information</h4>
                <hr style="color: #000">
                <div class="user-details">
                    <div>
                      <div id="main" class="input-box">
                          <span class="details">Full Name:</span>
                          <span class="blog-name">{{userInfo.name}}</span>
                      </div>
                      <div class="input-box">
                          <span class="details">Email:</span>
                          <span class="blog-name">{{userInfo.email}}</span>
                      </div>
                      <div class="input-box">
                          <span class="details">Country:</span>
                          <span class="blog-name">{{userInfo.country}}</span>
                      </div>
                    
                      <div class="input-box">
                          <span class="details">Phone Number:</span>
                          <span class="blog-name">0{{userInfo.phone}}</span> 
                      </div>
                      
                      <div class="input-box">
                          <span class="details">National:</span>
                          <span class="blog-name">{{userInfo.nationality}}</span> 
                      </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
const API_URL = 'http://127.0.0.1:8000/api/';
    export default {
      data(){
        return {
          userInfo: "",
          url : 'http://127.0.0.1:8000/storage/imageUser/',
        }
      },
      methods: {
        getuserInfo(){
          let userid = localStorage.getItem('userID');
          axios.get(API_URL + "users").then(res => {
            for(let user of res.data){
              if(user.id == userid){
                this.userInfo = user;
              }
            }
          })
        }
      },
      mounted() {
        this.getuserInfo()
      },
    }
</script>



<style scoped>
    *{
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
#main{
  margin-top: 10%;
}
.profile{
  width: 100%;
}
img{
  width: 100%;
  height: 100%;
  border-radius: 360px;
}
.blog-header{
  display: flex;
  justify-content: space-between;
}
.blog-profile{
  width: 15%;
  height: 18vh;
}
.titil {
  line-height: 90px;
  margin-left: 10px;
  font-size:25px;
  font-weight: 600;
  text-transform: uppercase;
}
.button-submit{
  margin-top: 30px;
  width: 35%;
}
.save, .cancel {
  margin-left: 30px;
  font-size: 15px;
  border: none;
  width: 60px;
  padding:4px;
  cursor: pointer;
}
.save {
  color: #fff;
  background: rgb(52, 105, 219);
}
.cancel {
    background: none;
}
#description{
  width: 100%;
  outline: none;
}
.container-profile {
  margin-left: 20%;
  margin-top: 4%;
  width: 60%;
  height: 60vh;
  background: rgb(255, 252, 252);
  box-shadow: rgba(60, 64, 67, 0.315) 0px 1px 2px 0px, rgba(60, 64, 67, 0.377) 0px 2px 6px 2px;
  padding: 25px 30px;
  border-radius: 5px;
}

.container-profile .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container-profile .title::before {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  /* background: linear-gradient(160deg, #74afd6, #9b59b6); */
}
.container-profile form .user-details {
  display: flex;
  justify-content: space-between;
  margin: 20px 0 12px 0;
  margin-top: 10px;
  margin-bottom: 10px;
}

.blog-info {
  text-align:center;
  text-transform: uppercase;
  font-weight: 700;
}
.details {
  margin-right: 25px;
}
.blog-name {
  border-bottom: 1px solid #000;
}
.input-box {
  margin-bottom: 10px;
}
form .user-details .input-box {
  /* margin-bottom: 5px; */
  width: calc(100% / 2 -20px);
}
.user-details .input-box .details {
  /* display: block; */
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 30px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 12px;
  border-bottom-width: 2px;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}


@media (max-width: 584px){
  .container{
    max-width: 100%;
  }
  form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .gender-details .category{
    width: 100%;
  }
  .container form .user-details{
    max-width: 300px;
    overflow: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 0;
  }
}

</style>