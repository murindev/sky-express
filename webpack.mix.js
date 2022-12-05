const mix = require('laravel-mix');

// mix.browserSync('http://127.0.0.1:8000/calculator')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/pages/calculator.js', 'public/js/pages')
    .js('resources/js/pages/home.js', 'public/js/pages')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

