import {createRouter , createWebHistory} from 'vue-router';


import Home from '../page//Home.vue';
// import Home from '../page/Home.vue';






const routes = [
    {
        path : '/',
        component : () => import('../page/Admin/Main.vue'),
        meta : {
            title : 'Home'
        }
    },
    // {
    //     path : '/auth/login',
    //     component : () => import('../page/auth/Login.vue'),
    //     meta : {
    //         title : 'Login',
    //         noHeader: true
    //     }
    // },
    // {
    //     path : '/auth/register',
    //     component : () => import('../page/auth/Register.vue'),
    //     meta : {
    //         title : 'Register'
    //     }
    // },
    {
        path : '/categories',
        component :  () => import('../page/Admin/Category/index.vue'),
        meta : {
            title : 'Categories'
        }
    },
    {
        path : '/categories/new-category',
        component : () => import('../page/Admin/Category/NewCategory.vue'),
        meta : {
            title : 'NewCategory'
        }
    },
    {
        path : '/items',
        component : () => import('../page/Admin/Item/index.vue'),
        meta : {title:'Items'}
    },
    {
        path : '/items/new-item',
        component : () => import("../page/Admin/Item/newItem.vue"),
        meta : {title:'NewItem'}
    },
    {
        path : '/items/apply-discount',
        component : () => import("../page/Admin/Item/discount.vue"),
        meta : {title:'ApplyDiscount'}
    },
    {
        path : '/:pathMatch(.*)*',
        component : () => import('../NotFound.vue') ,
        meta : {title:'NotFound'}
    },
]
const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router