import Vue from 'vue';
import VueRouter from "vue-router";
Vue.use(VueRouter)

import Search from "./components/Search.vue";
import Results from "./components/Results";

const routes = [
    {
        path: '/dashboard',
        component: Search,
        name: "Search"
    },
    {
        path: '/search',
        component: Results,
        name: "Dashboard",
        meta: {
            requiresAuth: true
        }
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});



export default router
