
import { createRouter, createWebHistory } from "vue-router";

import Home from "../view/Home.vue";
import signin from "../components/authentication/signin.vue";
import signup from "../components/authentication/signup.vue";
import Myevent from "../components/ui/Myevent.vue";
import Categories from "../components/ui/Categories.vue";
import Findevent from "../components/ui/Findevent.vue";
import Manage_profile from "../view/Manage_profile.vue";
import about from "../view/about.vue";
import service from "../view/service.vue";

const routes = [
        { path: '/Manage_profile', component: Manage_profile },
        { path: '/', component: signin },
        { path: '/signin', component: signin },
        { path: '/home', component: Home },
        { path: '/signup', component: signup },
        { path: '/myevent', component: Myevent },
        { path: '/findevent', component: Findevent },
        { path: '/categories', component: Categories },
        { path: '/about', component: about },
        { path: '/service', component: service },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;