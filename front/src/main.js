import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'
import Myevent from './components/Event/Myevent.vue'
import Findevent from './components/Event/Findevent.vue'
import Categories from './components/Event/Categories.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
      // { path: '/', component: TheNavigation },
      { path: '/myevent', component: Myevent },
      { path: '/findevent', component: Findevent },
      { path: '/categories', component: Categories },
      // { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
  });

  const app = createApp(App);
  app.use(router);
  app.mount("#app");