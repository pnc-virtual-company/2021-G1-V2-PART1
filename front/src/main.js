import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
// import Themenu from './components/navigation/Themenu.vue'
// import signin from './components/Signin_signup/signin.vue'
import signup from './components/Signin-Signup/signup.vue'
import Signin from './components/Signin-Signup/Signin.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/', component: Signin},
        { path: '/signup', component: signup },
      
      // { path: '/teams', component: TeamsList },
      // { path: '/users', component: UsersList },
      // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
  });


// app.component('sign-in', Signin);

const app = createApp(App);
app.use(router);
app.mount("#app");
