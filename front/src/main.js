import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'

import categoriesForm from './components/categories/categories-form.vue'
import categoriesView from './components/categories/categories-view.vue' 



const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: categoriesView },
        { path: '/categoryView', component: categoriesView },
        { path: '/categoriesForm', component: categoriesForm },

        // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
});

const app = createApp(App);
app.use(router);
app.mount("#app");
