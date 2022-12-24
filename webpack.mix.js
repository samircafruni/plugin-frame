const mix = require('laravel-mix');

mix
    .js('src/resources/assets/scripts/index.js', 'dist/resources/assets/scripts')
    .js('src/resources/assets/scripts/admin.js', 'dist/resources/assets/scripts')

    .autoload({
        jquery: ['$', 'window.jQuery']
    })

    .sass('src/resources/assets/styles/index.scss', 'dist/resources/assets/styles')
    .sass('src/resources/assets/styles/admin.scss', 'dist/resources/assets/styles')
    
    .copy(
        [
            'src/app',
        ], 
        'dist/app'
    )

    .copy(
        [
            'src/resources/assets/images',
        ], 
        'dist/resources/assets/images'
    )

    .copy(
        [
            'src/resources/views',
        ], 
        'dist/resources/views'
    );
