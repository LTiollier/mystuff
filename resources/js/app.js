require('./bootstrap');

import Vue from 'vue';
import { App, plugin } from '@inertiajs/inertia-vue';
import { InertiaProgress } from '@inertiajs/progress/src';

Vue.config.productionTip = false;
Vue.mixin({ methods: { route: window.route } })
Vue.use(plugin);

require('@/Plugins/buefy.js');
require('@/Plugins/folder.js');

InertiaProgress.init();

const el = document.getElementById('app');

new Vue({
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
            },
        }),
}).$mount(el);
