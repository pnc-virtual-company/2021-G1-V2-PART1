import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";

import Home from "./components/menu/Home.vue";
import TheNavigation from "./components/menu/TheNavigation.vue";
import signin from "./components/Signin-signup/signin.vue";
import signup from "./components/Signin-signup/signup.vue";
import Myevent from "./components/Event/Myevent.vue";
import EventForm from "./components/Event/EventForm.vue";
import Findevent from "./components/Event/Findevent.vue";
import Categories from "./components/Event/Categories.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
            { path: '/', component: signin },
            { path: '/signin', component: signin },
            { path: '/home', component: Home },
            { path: '/menu', component: TheNavigation },
            { path: '/signup', component: signup },
            { path: '/myevent', component: Myevent },
            { path: '/eventform', component: EventForm },
            { path: '/findevent', component: Findevent },
            { path: '/categories', component: Categories },
        ]
});

const app = createApp(App);

app.component("menu-bar", TheNavigation);
app.component("the-navigation", signin);
app.use(router);
app.mount("#app");