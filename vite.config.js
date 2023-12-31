import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/dashboard/app.css', 'resources/js/dashboard/app.js'],
            refresh: true,
        }),
        vue()
    ],
});
