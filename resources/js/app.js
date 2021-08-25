require('./bootstrap');
import Vue from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue';
import VModal from 'vue-js-modal';

Vue.use(VModal, {dialog: true});

export const eventBus = new Vue();

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    id: 'app',
    setup({el, App, props}) {
        new Vue({
            render: h => h(App, props),
        })
            .$mount(el)
    },
})
