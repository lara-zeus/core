import colors from 'tailwindcss/colors'

module.exports = {
    darkMode: 'class',
    content: [
        // Core
        './resources/views/**/*.blade.php',
        // Wind
        '../wind/resources/views/themes/**/*.blade.php',
        // Sky
        '../sky/resources/views/themes/**/*.blade.php',
        // Bolt
        '../bolt/resources/views/themes/**/*.blade.php',
        '../bolt/src/Models/FormsStatus.php',
        // Thunder
        '../thunder/resources/views/themes/**/*.blade.php',
        '../thunder/src/Models/TicketsStatus.php',
        // Rain
        '../rain/resources/views/themes/**/*.blade.php',
        '../rain/src/Models/Columns.php',
        // filament
        './vendor/filament/**/*.blade.php',
        './src/CoreServiceProvider.php',
    ],
    theme: {
        extend: {
            colors: {
                gray: colors.stone,
                primary: colors.emerald,
                secondary: colors.yellow,
                danger: colors.red,
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
