import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
//tailwindcss
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    //tailwindcss
    css: {
        postcss: {
            plugins: [
                tailwindcss,
            ],
        },
    },
});
