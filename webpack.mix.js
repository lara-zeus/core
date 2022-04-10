const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'assets')
   .postCss('resources/css/app.css', 'assets', [
       require('postcss-import'),
       require('tailwindcss'),
   ])
    .setPublicPath('resources')

   .copy('resources/assets', '../../nadel/public/vendor/zeus')
   .copy('resources/images', '../../nadel/public/vendor/zeus/images')

   .copy('resources/assets', '../bolt/public/vendor/zeus')
   .copy('resources/images', '../bolt/public/vendor/zeus/images')
;

if (mix.inProduction()) {
    mix.version();
}
