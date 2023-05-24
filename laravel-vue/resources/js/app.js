import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import Vue from 'vue';

import axios from "./axios";

Vue.prototype.$axios = axios;

import App from './App.vue';
import router from "./router";

import header from './components/siteHeader';

Vue.component('myHeader', header);

import 'element-ui/lib/theme-chalk/index.css';

new Vue({
    router,
    render: app => app(App)
}).$mount('#app');
