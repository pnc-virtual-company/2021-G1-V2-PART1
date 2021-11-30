import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
// import Themenu from './components/navigation/Themenu.vue'
// import signin from './components/Signin_signup/signin.vue'
// import signup from './components/Signin-signup/signup.vue'
// import signin from './components/Signin-signup/signin.vue'
import CTGform from './components/categories/CTGform.vue'
import view from './components/categories/view.vue' // categories view
const router = createRouter({
    history: createWebHistory(),
    routes: [
        // { path: '/', component: signin },
        // { path: '/signin', component: signin },
        // { path: '/signup', component: signup },
        // { path: '/menu', component: Themenu },
        { path: '/categoryview', component: view },
        { path: '/categoryform', component: CTGform },

        // { path: '/teams', component: TeamsList },
        // { path: '/users', component: UsersList },
        // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
});


// app.component('sign-in', Signin);

const app = createApp(App);
app.use(router);
app.mount("#app");
