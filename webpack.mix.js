const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");
const postcssImport = require("postcss-import");

mix
    .postCss('resources/css/filament.css', 'dist/filament-tail.css', [
        postcssImport,
        tailwindcss("./tailwind-filament.config.js"),
    ])

    .postCss('resources/css/frontend.css', 'dist', [
        postcssImport,
        tailwindcss("./tailwind-frontend.config.js"),
    ])

    .js('resources/js/plugin.js', 'resources/dist/plugin.js')

   .setPublicPath('resources')
;

if (mix.inProduction()) {
    mix.version();
} else {
    mix.copy('resources/dist', '../demo/public/css/lara-zeus')
    mix.copy('resources/dist', '../demo/public/vendor/zeus')
    mix.copy('resources/dist', '../zeus/public/vendor/zeus')
}
