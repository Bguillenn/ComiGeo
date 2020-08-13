/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueCarousel from '@chenfengyuan/vue-carousel';

import VueGeolocation from 'vue-browser-geolocation';
Vue.use(VueGeolocation);

import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDnr-MHYWQ2v9MVJNok3vaEfr0-JB-Z1Bs',
        libraries: 'places', // This is required if you use the Autocomplete plugin
        // OR: libraries: 'places,drawing'
        // OR: libraries: 'places,drawing,visualization'
        // (as you require)

        //// If you want to set the version, you can do so:
        // v: '3.26',
    },

    //// If you intend to programmatically custom event listener code
    //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
    //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
    //// you might need to turn this on.
    // autobindAllEvents: false,

    //// If you want to manually install components, e.g.
    //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
    //// Vue.component('GmapMarker', GmapMarker)
    //// then disable the following:
    // installComponents: true,
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('main-component', require('./components/MainComponent').default);
Vue.component('header-component', require('./components/HeaderComponent').default);
Vue.component('content-component', require('./components/ContentComponent').default);
Vue.component('search-component', require('./components/SearchComponent').default);
Vue.component('map-component', require('./components/MapComponent').default);
Vue.component('list-component', require('./components/ListComponent').default);
Vue.component('information-component', require('./components/InformationComponent').default);
Vue.component('search-list-component', require('./components/SearchListComponent').default);
Vue.component('search-item-component', require('./components/SearchItemComponent').default);
Vue.component(VueCarousel.name, VueCarousel);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});