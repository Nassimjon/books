const mix = require('laravel-mix');



mix.js('resources/js/main.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .js('resources/js/bootstrap.js', 'public/js')
    .version();


