
require('./bootstrap');
require('./util');

import Vue from 'vue';

Vue.component('pedidos',require('./components/Pedidos.vue').default);

if (window.componentVue) {
    for (var key in componentVue) {
        Vue.component(key, componentVue[key]);
    }
}

const app = new Vue({
    el: '#app',
});

window.vm = app;

