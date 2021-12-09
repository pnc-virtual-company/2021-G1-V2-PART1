import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";

import Home from "./components/menu/Home.vue";
import signin from "./components/Signin-signup/signin.vue";
import signup from "./components/Signin-signup/signup.vue";
import Myevent from "./components/Event/Myevent.vue";
import Categories from "./components/Event/Categories.vue";
import Profile from "./components/menu/Profile.vue";
import Findevent from "./components/Event/Findevent.vue";
import Manage_profile from "./components/menu/Manage_profile.vue";
import about from "./components/menu/about.vue";
import service from "./components/menu/service.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Profile },
        { path: '/Manage_profile', component: Manage_profile },
        // { path: '/', component: signin },
        { path: '/signin', component: signin },
        { path: '/home', component: Home },
        { path: '/signup', component: signup },
        { path: '/myevent', component: Myevent },
        { path: '/findevent', component: Findevent },
        { path: '/categories', component: Categories },
        { path: '/about', component: about },
        { path: '/service', component: service },
    ]
});

const app = createApp(App);

app.component('profile', Profile);
app.component("findEvent-card", Findevent);

app.use(router);
app.mount("#app");