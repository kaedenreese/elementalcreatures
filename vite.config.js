import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/css/gallery.css',
                'resources/css/howtoplay.css',
                'resources/css/live.css',
                'resources/css/spinner.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/gallery.js',
                'resources/js/live.js'
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
