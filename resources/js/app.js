import './bootstrap';

import { createApp } from "vue";
import Index from './Components/index.vue';
import AppStore from './Store/AppStore.js';

const app = createApp(Index)
    .use(AppStore)
    .mount('#root');
