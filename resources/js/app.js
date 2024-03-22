import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import "flowbite";
import { Head } from "@inertiajs/inertia-vue3";
import PrimeVue from 'primevue/config'; // Import PrimeVue config plugin

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue) // Use PrimeVue
            .component("Head", Head)
            .mount(el);
    },
    progress: {
      delay: 250,
      color: '#000',
      includeCSS: true,
      showSpinner: false,
    },
    title: (title) => `${title} - App Name`,
});
