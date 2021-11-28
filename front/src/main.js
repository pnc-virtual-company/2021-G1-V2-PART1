import { createApp } from 'vue'
import App from './App.vue'
import Signin  from './components/Signin-Signup/Signin.vue'


const app = createApp(App);
app.component('sign-in', Signin);
app.mount('#app');


