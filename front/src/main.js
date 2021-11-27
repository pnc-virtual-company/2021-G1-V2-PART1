import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
import Themenu from './components/navigation/Themenu.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
      { path: '/', component: Themenu },
      // { path: '/teams', component: TeamsList },
      // { path: '/users', component: UsersList },
      // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
  });

  const app = createApp(App);
  app.use(router);
  app.mount("#app");