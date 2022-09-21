let mix = require('laravel-mix');

mix.js('src/mix/js/app.js', 'assets/js')
    .setPublicPath('assets');

mix.postCss('src/mix/css/app.css', 'assets/css', [
    require('tailwindcss')
]).setPublicPath('assets')