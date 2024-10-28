import { createRouter, createWebHistory } from 'vue-router';
import Login from './layouts/Login.vue';
import Dashboard from './components/dashboard/DashboardComponent.vue';
import CreateProduct from './components/dashboard/CreateProduct.vue';
import EditProduct from './components/dashboard/EditProduct.vue';

const routes = [
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: { requiresAuth: true },
    },
    {
        path: '/create_product',
        name: 'create_product',
        component: CreateProduct,
        meta: { requiresAuth: true }
    },
    {
        path: '/edit_product/:id',
        name: 'edit_product',
        component: EditProduct,
        meta: { requiresAuth: true }
    }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

router.beforeEach((to, from, next) => {
    if (to.name === 'dashboard' && to.meta.requiresAuth) {
        const token = localStorage.getItem('token');
        if (token) {
            next();
        } else {
            next({ name: 'login' });
        }
    } else {
        next();
    }
});

export default router;
