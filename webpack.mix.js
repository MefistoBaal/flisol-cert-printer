const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.browserSync('https://flisol.test');
mix.js('resources/js/app.js', 'public/js').version();
mix.react('resources/js/home/app.jsx', 'public/js/react/home').version()
    .react('resources/js/login/app.jsx', 'public/js/react/login').version()
    .react('resources/js/admin/app.jsx', 'public/js/react/admin').version();
