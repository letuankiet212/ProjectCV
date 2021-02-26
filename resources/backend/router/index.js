import Vue from "vue";
import VueRouter from "vue-router";
import LayoutDefault from "../layout/LayoutDefault";
import Home from '../views/Home/index'

Vue.use(VueRouter)

const routes = [
    {
        path: "/admin",
        name: "Home",
        component: Home,
        meta:
            {icon: 'icon-home'},
    },
    {
        path: "/admin/infomation",
        name: "Infomation",
        component: () => import('../views/Infomation/index'),
        meta:
            {icon: 'icon-user'},
    },
    {
        path: "/admin/portfolio",
        name: 'Portfolio',
        component: () => import('../views/Portfolio/index'),
        meta: {
            icon: 'icon-folder'
        },
    },

    // {
    //     path: "/admin/infomation",
    //     name: "About",
    //     component: LayoutDefault,
    //     meta:
    //         { icon: 'icon-user' },
    //     children: [
    //         {
    //             path: '',
    //             name: '',
    //             component: () => import('../views/About/index')
    //         },
    //         {
    //             path: 'new',
    //             name: 'New About',
    //             component: () => import('../views/About/Create/index')
    //         }
    //     ]
    // },
]

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: 'active',
    base: process.env.BASE_URL,
    routes
})

export default router;
