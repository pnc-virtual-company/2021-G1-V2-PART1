import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
// import TheNavigation from './components/menu/TheNavigation.vue';
// import signup from './components/Signin-signup/signup.vue'
// import signin from './components/Signin-signup/signin.vue'
import EventForm from './components/Event/EventForm.vue'
import CardEvent from './components/Event/CardEvent.vue'
// import Dialog from './components/Event/Dialog.vue'
// import Findevent from './components/Event/Findevent.vue'

// =================Event=============================

const router = createRouter({
    history: createWebHistory(),
    routes: [
        // { path: '/', component: Findevent },
        // { path: '/myevent', component: EventForm }
            { path: '/', component: CardEvent },
            { path: '/Cardevent', component: CardEvent },
            { path: '/eventForm', component: EventForm },
            // { path: '/dialog', component: Dialog },
        ]
        // { path: '/signin', component: signin },
        // { path: '/signup', component: signup },
        // { path: '/menu', component: TheNavigation },
        // { path: '/myevent', component: Myevent },
        // { path: '/Findevent', component: Findevent },
        // =================Event======================
        // { path: '/findevent', component: TheNavigation },
        // { path: '/categories', component: TheNavigation },

    // { path: '/findevent', component: TheNavigation },
    // { path: '/categories', component: TheNavigation },
    // { path: '/users', component: UsersList },
    // { path: '/teams/:teamId', component: TeamInformation, props: true }
});


// app.component('sign-in', Signin);
// app.component("friend-card", Findevent);

const app = createApp(App);
app.use(router);
app.mount("#app");