/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.axios = require('axios')
const Vue = require('vue')

import AsyncComputed from "vue-async-computed";
import App from './views/app.vue'
import router from './router'
import VueObserveVisibility from 'vue-observe-visibility'

Vue.use(VueObserveVisibility)
Vue.use(AsyncComputed)
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
