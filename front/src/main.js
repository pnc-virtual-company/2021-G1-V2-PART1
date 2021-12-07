import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";

import Home from "./components/menu/Home.vue";
import signin from "./components/Signin-signup/signin.vue";
import signup from "./components/Signin-signup/signup.vue";
import Myevent from "./components/Event/Myevent.vue";
import EventForm from "./components/Event/EventForm.vue";
import Findevent from "./components/Event/Findevent.vue";
import Categories from "./components/Event/Categories.vue";
import Profile from "./components/menu/Profile.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
            { path: '/', component: signin },
            { path: '/signin', component: signin },
            { path: '/home', component: Home },
            { path: '/profile', component: Profile },
            { path: '/signup', component: signup },
            { path: '/myevent', component: Myevent },
            { path: '/eventform', component: EventForm },
            { path: '/findevent', component: Findevent },
            { path: '/categories', component: Categories },
        ]
});

const app = createApp(App);

app.component("user-profile", Profile);
app.use(router);
app.mount("#app");