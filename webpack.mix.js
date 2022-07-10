const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'dist')
   .postCss('resources/css/app.css', 'dist', [
       require('postcss-import'),
       require('tailwindcss'),
   ])
    .setPublicPath('resources')

   //.copy('resources/dist', '../demo/public/vendor/zeus')

;

if (mix.inProduction()) {
    mix.version();
}
