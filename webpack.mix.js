const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'dist')
   .postCss('resources/css/app.css', 'dist', [
       require('postcss-import'),
       require('tailwindcss'),
   ])
   .setPublicPath('resources')
;

if (mix.inProduction()) {
    mix.version();
} else {
    mix.copy('resources/dist', '../demo/public/vendor/zeus')
    mix.copy('resources/dist', '../bolt-pkg/resources/dist')
}
