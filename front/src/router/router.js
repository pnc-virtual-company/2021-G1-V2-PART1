
import { createRouter, createWebHistory } from "vue-router";

import Home from "../";
import signin from "ui/signin.vue";
import signup from "../ui/signup.vue";
import Myevent from "../ui/Myevent.vue";
import Categories from "../ui/Categories.vue";
// import Profile from "../view/Profile.vue";
import Findevent from "../ui/Findevent.vue";
import Manage_profile from "../view/Manage_profile.vue";
import about from "../viewe/about.vue";
import service from "../view/service.vue";

const routes = [
        // { path: '/', component: Profile },
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
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router;