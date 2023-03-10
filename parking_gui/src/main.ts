import "mdb-vue-ui-kit/css/mdb.min.css";

import { createApp } from "vue";
import { createPinia } from 'pinia';
import App from "./App.vue";
import router from "./router";
import { toast } from 'vue3-toastify';

import "./style.css";
import 'vue3-toastify/dist/index.css';

const pinia = createPinia();
const app = createApp(App);
app.use(router);
app.use(pinia);
app.use(toast);
app.mount("#app");
