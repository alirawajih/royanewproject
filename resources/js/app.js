import {createApp} from 'vue/dist/vue.esm-bundler.js';

import './bootstrap';
require('./bootstrap');

// import {createApp} from 'vue'

import App from './App.vue'

createApp(App).mount("#app")
