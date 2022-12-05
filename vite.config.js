import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'public/assets/less/style.css',
            // 'resources/js/app.js',
        ]),
    ],
});
