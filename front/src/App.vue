
<template> 
  <section>
    <router-view
     @new-user="addNewUser"
    ></router-view>
  </section>
</template>


<script>
// import signup from './components/Signin-signup/signup.vue'

export default {
  data() {
    return{
      userLists:[],
    }
  },
  methods: {
    addNewUser(name, gender, email, password, img){
      const newUser = {
        name: name,
        gender: gender,
        email: email,
        password: password,
        imang: img,
      }
     
      this.userLists.push(newUser);
      console.log(this.userLists);
    }
  },
}
</script>

