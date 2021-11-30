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
      userLists: [],
    };
  },
  methods: {
      createNewuser(name,email,password,confirmation_password) {
        let newUser = {
          name: name ,
          email: email,
          password: password,
          password_confirmation: confirmation_password ,
        }

        axios.post(API_URL + "/signup" , newUser).then(res => {
          this.userLists.push(res.data.user);
          this.$router.push('/menu');
          console.log("created");
        })

      },
  },
    
  mounted() {
      axios.get(API_URL + "/users").then(res => {
        this.userLists = res.data;
        console.log(this.userLists)
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

