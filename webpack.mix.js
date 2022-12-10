const mix = require('laravel-mix');
const { memoize } = require('lodash');
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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/backOffice.js', 'public/js')
    .sass("resources/sass/styles.scss", "public/css")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
      ]);

mix.browserSync('127.0.0.1:8000');
