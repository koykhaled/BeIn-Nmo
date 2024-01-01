import {createRouter , createWebHistory} from 'vue-router';


import Home from '../page//Home.vue';
// import Home from '../page/Home.vue';





const routes = [
    {
        path : '/',
        component : () => import('../page/Admin/Main.vue'),
        meta : {
            title : 'Home',
            auth: true,
            auth: true,
        }
    },
    {
        path : '/auth/login',
        component : () => import('../page/auth/Login.vue'),
        meta : {
            title : 'Login',
            auth: false,
            noHeader: true
        }
    },
    {
        path : '/auth/register',
        component : () => import('../page/auth/Register.vue'),
        meta : {
            title : 'Register',
            auth: true,
        }
    },
    {
        path : '/categories',
        component :  () => import('../page/Admin/Category/index.vue'),
        meta : {
            title : 'Categories',
            auth: true,
        }
    },
    {
        path : '/categories/new-category',
        component : () => import('../page/Admin/Category/NewCategory.vue'),
        meta : {
            title : 'NewCategory',
            auth: true,
        }
    },
    {
        path : '/items',
        component : () => import('../page/Admin/Item/index.vue'),
        meta : {title:'Items',
        auth: true,}
    },
    {
        path : '/items/new-item',
        component : () => import("../page/Admin/Item/newItem.vue"),
        meta : {title:'NewItem',
        auth: true,}
    },
    {
        path : '/items/apply-discount',
        component : () => import("../page/Admin/Item/discount.vue"),
        meta : {title:'ApplyDiscount',
        auth: true,}
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

router.beforeEach((to)=>{
    console.log(to.meta.auth);
}
)

export default router