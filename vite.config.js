import { defineConfig } from 'vite';
import Laravel from 'Laravel-vite-plugin';

export default defineConfig({
    plugins: [
        Laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
