const mix = require('laravel-mix');
require('mix-tailwindcss');

mix
    .js('resources/assets/scripts/app.js', 'dist/assets/scripts')

    .autoload({
        jquery: ['$', 'window.jQuery']
    })

    .sass('resources/assets/styles/app.scss', 'dist/assets/styles')
    .sass('resources/assets/styles/admin.scss', 'dist/assets/styles')

    .copy('resources/assets/images/*', 'dist/assets/images')

    .webpackConfig({
        stats: {
            children: true,
        },
    })

    .options({
        processCssUrls: false
    });