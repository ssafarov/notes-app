/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './views/App';

import Api from "./api/Notes";

import List from "./components/List";
import Note from "./components/Note";


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('note-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'welcome',
            component: List
        },
        {
            path: '/modern',
            name: 'home',
            component: List
        },
        {
            path: '/modern/note/create',
            name: 'create',
            component: Note,
        },
        {
            path: '/modern/note/:id',
            name: 'view',
            component: Note,
        },
        {
            path: '/modern/note/:id/edit',
            name: 'edit',
            component: Note,
        },
        {
            path: '/modern/note/:id/delete',
            name: 'delete',
            component: Note,
        },
        {
            path: '*',
            name: 'missing',
            beforeEnter(to, from, next) {
                next(false);
                window.location.replace(to.fullPath);
            },
        },
    ],
});

const app = new Vue({
    el: '#notes-app',
    components: { App },
    router,
});
