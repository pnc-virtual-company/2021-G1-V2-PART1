<template>

  <section>
    <router-view
    @new-user="createNewuser"
    ></router-view>
  </section>
</template>

<script>
import axios from 'axios';
const API_URL = "http://127.0.0.1:8000/api";

// import TheNavigation from './components/menu/TheNavigation.vue'
export default {
  components: {
    // TheNavigation,
  },

  data() {
    return {
      userLists: [
        // {name: "Chanthy tha", email: "chanthy@gmail.com", password: "123", gender: "M"},
        // {name: "Thin", email: "thin@gmail.com", password: "123", gender: "M"},
        // {name: "Sophanna", email: "sophanna@gmail.com", password: "123", gender: "M"},
        // {name: "Vun", email: "vun@gmail.com", password: "123", gender: "F"},
      ],
     
    };
   
  },
  

  methods: {
      createNewuser(name,email,password,gender) {
        let newUser = {
          name: name ,
          email: email,
          password: password,
          gender: gender ,
        }

        axios.post(API_URL + "/signup" , newUser).then(res => {
          this.userLists.push(res.data.user);
        })
       
      },
  },
    
  mounted() {
      axios.get(API_URL + "/users").then(res => {
        this.userLists = res.data;
      })
  },
  
};
</script>


<style>
   body{
      background-image: url('https://jooinn.com/images/time-4.jpg') ;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
     
    }


  html {
    font-family: sans-serif;
  }

  
</style>

