import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
// import Themenu from './components/navigation/Themenu.vue'
// import signin from './components/Signin_signup/signin.vue'
import signup from './components/Signin-signup/signup.vue'


const router = createRouter({
    history: createWebHistory(),
    routes: [
      { path: '/', component: signup },
      // { path: '/', component: signin },
      // { path: '/teams', component: TeamsList },
      // { path: '/users', component: UsersList },
      // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
  });

  // app.component("signup-form", signup);

  const app = createApp(App);
  app.use(router);
  app.mount("#app");
