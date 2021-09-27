

require('./bootstrap');

window.Vue = require('vue').default;



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('my-map-component', require('./components/MapObject.vue').default);
import Vue from 'vue';
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, { load: { key: 'AIzaSyC1sDBZ-qgAvB2kKlcFX5eLZn_MvmJKd1M', }, installComponents: true, })
const app = new Vue({
    el: '#app',
});
