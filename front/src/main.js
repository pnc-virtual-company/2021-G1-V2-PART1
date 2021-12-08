import { createApp } from "vue";
import App from "./App.vue";
import Findevent from "./components/Event/Findevent.vue";

const app = createApp(App);

app.component("friend-card", Findevent);

app.mount("#app");
