const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");
const postcssImport = require("postcss-import");

mix
    .js('resources/js/app.js', 'dist')
    .js('resources/js/filament.js', 'dist')

    .postCss('resources/css/filament.css', 'dist/filament-tail.css', [
        postcssImport,
        tailwindcss("./tailwind-filament.config.js"),
    ])

    .postCss('resources/css/frontend.css', 'dist', [
        postcssImport,
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
    mix.copy('resources/dist', '../v3/public/css/lara-zeus')
}
