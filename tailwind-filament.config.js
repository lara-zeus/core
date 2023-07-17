import preset from './vendor/filament/filament/tailwind.config.preset'
import colors from 'tailwindcss/colors'

module.exports = {
    presets: [preset],
    content: [
            // Core
            './resources/views/**/*.blade.php',
            // Wind
            '../wind/resources/views/filament/**/*.blade.php',
            // Rain
            '../rain/resources/views/filament/**/*.blade.php',
            // Rhea
            '../rain/resources/views/**/*.blade.php',
            // Sky
            '../sky/resources/views/filament/**/*.blade.php',
            '../sky/src/Models/PostStatus.php',
            // Bolt
            '../bolt/resources/views/filament/**/*.blade.php',
            // Thunder
            '../thunder/resources/views/**/*.blade.php',
            '../thunder/src/Models/TicketsStatus.php',
    ],
    theme: {
        extend: {
            colors: {
                gray: colors.stone,
                primary: colors.emerald,
                custom: colors.emerald,
                secondary: colors.yellow,
                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,
                info: colors.blue,
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('tailwindcss-debug-screens'),
    ],
};
