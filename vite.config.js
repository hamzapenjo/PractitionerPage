import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/bootstrap.min.css',
                'resources/css/bootstrap.min.css.map',
                'resources/css/paper-dashboard.css',
                'resources/css/paper-dashboard.css.map',
                'resources/css/paper-dashboard.min.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/paper-dashboard.js',
                'resources/js/paper-dashboard.js.map',
                'resources/js/paper-dashboard.min.js',
                'resources/js/core/bootstrap.min.js',
                'resources/js/core/jquery.min.js',
                'resources/js/core/popper.min.js',
                'resources/js/plugins/bootstrap-notify.js',
                'resources/js/plugins/chartjs.min.js',
                'resources/js/plugins/perfect-scrollbar.jquery.min.js',
                'resources/scss/paper-dashboard.scss'
            ],
            refresh: true,
        }),
    ],
});
