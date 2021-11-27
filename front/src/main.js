import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from "./App.vue";
import Themenu from './components/navigation/Themenu.vue'


const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: Themenu },
    // { path: '/students', component: StudentView },
    // { path: '/students/:studentId', component: StudentDetails, props: true },
    // { path: '/:notFound(.*)', component: StudentNotFound },
  ],
});

const app = createApp(App);
app.use(router);
app.mount("#app");
