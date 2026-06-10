import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

import $ from 'jquery';
window.$ = window.jQuery = $;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

createInertiaApp({
    resolve: name => {
        return import(`./Pages/${name}.vue`);
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});