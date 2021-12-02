import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'

import EventForm from './components/Event/EventForm.vue'
import CardEvent from './components/Event/CardEvent.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
            { path: '/', component: CardEvent },
            { path: '/Cardevent', component: CardEvent },
            { path: '/eventForm', component: EventForm },
            { path: '/FormEvent', component: FormEvent },
        ]
});

const app = createApp(App);
app.use(router);
app.mount("#app");