let mix = require('laravel-mix');

mix.js('src/app.js', 'js')
    .sass('src/app.scss', 'css')
    .setPublicPath('dist')
    .browserSync({
        proxy: 'http://localhost:10118/',
        files: ['dist/css/app.css', 'dist/js/app.js', './*.php']
    })
    .options({
        processCssUrls: false,
    });