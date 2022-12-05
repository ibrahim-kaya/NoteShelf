import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/homepage.js',
                'resources/js/edit-note-page.js',
                'resources/js/note-page.js',
            ],
            refresh: true,
        }),
    ],
});
