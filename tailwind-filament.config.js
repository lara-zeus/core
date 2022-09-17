const colors = require('tailwindcss/colors')

module.exports = {
    darkMode: 'class',
    content: [
        '../wind-pkg/resources/views/filament/**/*.blade.php',

        '../sky-pkg/resources/views/filament/**/*.blade.php',
        '../sky-pkg/src/Models/PostStatus.php',

        '../bolt-pkg/resources/views/filament/**/*.blade.php',

        '../thunder-pkg/resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
};
