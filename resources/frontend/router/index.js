import Vue from "vue";
import VueRouter from "vue-router";
import LayoutDefault from "../layout/LayoutDefault";
import Home from '../views/Home/index'

Vue.use(VueRouter)

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/about",
        name: "About",
        component: LayoutDefault,
        children: [
            {
                path: '',
                name: '',
                component: () => import('../views/About/index')
            },
            {
                path: 'new',
                name: 'New About',
                component: () => import('../views/About/Create/index')
            }
        ]
    }
]

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: 'active',
    base: process.env.BASE_URL,
    routes
})

export default router;
