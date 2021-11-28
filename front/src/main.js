import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
import TheNavigation from './components/menu/TheNavigation.vue';
// import signin from './components/Signin_signup/signin.vue'
import signup from './components/Signin-signup/signup.vue'
import signin from './components/Signin-signup/signin.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/', component: signin},
        { path: '/signup', component: signup },
      { path: '/menu', component: TheNavigation },
      // { path: '/users', component: UsersList },
      // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
  });


// app.component('sign-in', Signin);

const app = createApp(App);
app.use(router);
app.mount("#app");
