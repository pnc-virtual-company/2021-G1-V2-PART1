import { createApp } from "vue";
import App from "./App.vue";
import { createRouter, createWebHistory } from "vue-router";

import TheNavigation from "./components/menu/TheNavigation.vue";
import signin from "./components/Signin-signup/signin.vue";
import signup from "./components/Signin-signup/signup.vue";
import Myevent from "./components/Event/Myevent.vue";
import Findevent from "./components/Event/Findevent.vue";
import Categories from "./components/Event/Categories.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
            { path: '/', component: signin },
            { path: '/signin', component: signin },
            { path: '/signup', component: signup },
            { path: '/menu', component: TheNavigation },
            { path: '/myevent', component: Myevent },
            { path: '/findevent', component: Findevent },
            { path: '/categories', component: Categories },
        ]
});

// createApp({}).mount("#app");
const app = createApp(App);

app.component("menu-bar", TheNavigation);
app.component("the-navigation", signin);
app.use(router);
app.mount("#app");