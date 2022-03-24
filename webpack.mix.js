const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/calendar.js", "public/js")
    .js("resources/js/success.js", "public/js")
    .js("resources/js/datetimepicker.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .css("resources/css/app.css", "public/css")
    .css("resources/css/styles.css", "public/styles")
    .sourceMaps();
