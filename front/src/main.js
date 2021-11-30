import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
import TheNavigation from './components/menu/TheNavigation.vue';
import signup from './components/Signin-signup/signup.vue'
import signin from './components/Signin-signup/signin.vue'

// =================Event=============================

import Myevent from './components/Event/Myevent.vue'
import Findevent from './components/Event/Findevent.vue'
import Categories from './components/Event/Categories.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: signin },
        { path: '/signin', component: signin },
        { path: '/signup', component: signup },
        { path: '/menu', component: TheNavigation },
      
        // =================Event======================
      
        { path: '/myevent', component: Myevent },
        { path: '/findevent', component: Findevent },
        { path: '/categories', component: Categories },
        // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
});


// app.component('sign-in', Signin);

const app = createApp(App);
app.use(router);
app.mount("#app");