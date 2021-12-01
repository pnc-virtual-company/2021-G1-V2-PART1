<<<<<<< HEAD
=======
<template>
  <section>
    <view></view>
    <signup-form
    @new-user="addNewUser"
    ></signup-form>
    <signin></signin>

    <navigation></navigation>
    
    <router-view></router-view>
  </section>
</template>


<script>
// import signup from './components/Signin-signup/signup.vue'

export default {
  components: {
    // signup,
  
  },
  data() {
    return{
      userLists:[],
    }
  },
  methods: {
    addNewUser(name, gender, email, password){
      const newUser = {
        name: name,
        gender: gender,
        email: email,
        password: password,
      }
      console.log(newUser);
      console.log("name: " + name);
    }
  },
}
</script>

>>>>>>> e736a0551b0070d086a24c4e67984bb97324de50
