import { createApp } from "vue";
import App from "./App.vue";
import router from './router/router.js'

import Profile from "../Profile.vue";
import Findevent from "../Findevent.vue";

const app = createApp(App);

app.component('profile', Profile);
app.component("findEvent-card", Findevent);

app.use(router);
app.mount("#app");