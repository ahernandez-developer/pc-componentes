import Vue from "vue";
import VueMeta from "vue-meta";
import PortalVue from "portal-vue";
import { App, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress/src";

import Vuetify from "../plugins/vuetify";
Vue.config.productionTip = false;
Vue.use(plugin);
Vue.use(PortalVue);
Vue.use(VueMeta);
Vue.prototype.$route = route;

InertiaProgress.init();

const el = document.getElementById("app");


new Vue({
    vuetify: Vuetify,
    metaInfo: {
        titleTemplate: title => (title ? `${title} - PC componentes` : "PC Componentes")
    },
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name =>
                    import(`@/Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(el);
