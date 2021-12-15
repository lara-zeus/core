const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'assets')
   .postCss('resources/css/app.css', 'assets', [
       require('postcss-import'),
       require('tailwindcss'),
   ])
    .setPublicPath('resources')
;

if (mix.inProduction()) {
    mix.version();
}
