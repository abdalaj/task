import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { createApp, h } from "vue";
import { Ziggy } from './ziggy';
import GuestLayout from "./Layouts/GuestLayout.vue";

createInertiaApp({
    resolve: async (name) => {
        const pageFiles = import.meta.globEager(
            "../../Modules/**/Pages/**/*.vue"
        );
        const pagePath = Object.keys(pageFiles).find((path) =>
            path.includes(name)
        );
        if (!pagePath) {
            //   return import("../../path/to/404/Page.vue");
        }
        const page = pageFiles[pagePath];
        if (name == "Login" || name == "Register") {
            return page;
        }
        page.default.layout = page.default.layout || GuestLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Ziggy)
            .mount(el);
    },
});
