const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");

mix
    .js('resources/js/app.js', 'dist')
    .js('resources/js/filament.js', 'dist')

    .postCss('resources/css/filament/filament.css', 'dist/filament-tail.css', [
        require('postcss-import'),
        tailwindcss("./tailwind-filament.config.js"),
    ])

    .postCss('resources/css/frontend.css', 'dist', [
        require('postcss-import'),
        tailwindcss("./tailwind-frontend.config.js"),
    ])

   .setPublicPath('resources')
;

if (mix.inProduction()) {
    mix.version();
} else {
    mix.copy('resources/dist', '../demo/public/vendor/zeus')
    mix.copy('resources/dist', '../zeus/public/vendor/zeus')
    mix.copy('resources/dist', '../v3/public/vendor/zeus')
}
