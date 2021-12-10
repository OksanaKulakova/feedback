require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

Vue.component('home', require('./components/Home.vue').default);

const app = new Vue({
    el: "#app",
});
