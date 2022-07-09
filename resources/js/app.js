require('./bootstrap'); // bootstrap

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

// this is where the App component below comes from
// import App from './vue/app'; // resources\js\vue\app.vue - ./ = enter same folder as this (app.js)
import { createWebHistory, createRouter } from "vue-router";
import Welcome from "./Jetstream/Welcome";
import TagAdmin from "./Tags/TagAdmin";
import ProductAdmin from "./Products/ProductAdmin";

const routes = [
    {
      path: "/",
      name: "Home",
      component: Welcome,
    },
    {
      path: "/about",
      name: "About",
      component: Welcome,
    },
  ];
  
  const router = createRouter({
    history: createWebHistory(),
    routes,
  });
  

// variable to hold details for "app"
const app = { // cross reference to resources\js\Pages\Welcome.vue and/or resources\js\Jetstream\Welcome.vue?
    el: '#app', // is this the same as <div id="app"> in the Welcome files above?
    components: { /* App, */ TagAdmin, ProductAdmin } // same App that was imported above
};

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: ( title ) => `${ title } - ${ appName }`,
    resolve: ( name ) => require( `./Pages/${ name }.vue` ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h( app, props ) })
            .use( plugin, router )
            .mixin({ methods: { route } })
            .mount( el );
    },
});

InertiaProgress.init({ color: '#4B5563' });