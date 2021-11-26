import { createApp } from 'vue'
import App from './App.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
      { path: '/', component: TeamsList },
      { path: '/teams', component: TeamsList },
      { path: '/users', component: UsersList },
      { path: '/teams/:teamId', component: TeamInformation, props: true }
    ]
  });
createApp(App).mount('#app')
