import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Books from '../components/Books';
import AddBook from '../components/AddBook';
import EditBook from '../components/EditBook';

import Orders from '../components/Orders';
import AddOrder from '../components/AddOrder';
import EditOrder from '../components/EditOrder';

import Suppliers from '../components/Suppliers';
import AddSupplier from '../components/AddSupplier';
import EditSupplier from '../components/EditSupplier';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'books',
        path: '/books',
        component: Books
    },
    {
        name: 'addbook',
        path: '/books/add',
        component: AddBook
    },
    {
        name: 'editbook',
        path: '/books/edit/:id',
        component: EditBook
    },
    {
        name: 'orders',
        path: '/orders',
        component: Orders
    },
    {
        name: 'addorder',
        path: '/orders/add',
        component: AddOrder
    },
    {
        name: 'editorder',
        path: '/orders/edit/:id',
        component: EditOrder
    },
    {
        name: 'suppliers',
        path: '/suppliers',
        component: Suppliers
    },
    {
        name: 'addsupplier',
        path: '/suppliers/add',
        component: AddSupplier
    },
    {
        name: 'editsupplier',
        path: '/suppliers/edit/:id',
        component: EditSupplier
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
