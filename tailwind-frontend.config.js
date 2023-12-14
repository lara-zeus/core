import colors from 'tailwindcss/colors'
import preset from './vendor/filament/filament/tailwind.config.preset'

module.exports = {
    presets: [preset],
    darkMode: 'class',
    content: [
        // Core
        './resources/views/**/*.blade.php',
        './src/CoreServiceProvider.php',
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
        // helen
        './vendor/lara-zeus/helen/resources/views/**/*.blade.php',
        './vendor/lara-zeus/helen/src/Filament/Resources/LinksResource.php',
        './vendor/lara-zeus/helen/src/Facades/Helen.php',
        // hermes
        '../hermes/resources/views/themes/**/*.blade.php',
        // Rain
        '../dynamic-dashboard/resources/views/themes/**/*.blade.php',
        '../dynamic-dashboard/src/Models/Columns.php',
        // filament
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                gray: colors.stone,
                primary: {  DEFAULT: '#45B39D',  50: '#C6E9E2',  100: '#B8E4DB',  200: '#9AD8CC',  300: '#7DCDBD',  400: '#5FC1AE',  500: '#45B39D',  600: '#358B79',  700: '#266256',  800: '#163A32',  900: '#07110F',  950: '#000000'},
                custom: {  DEFAULT: '#45B39D',  50: '#C6E9E2',  100: '#B8E4DB',  200: '#9AD8CC',  300: '#7DCDBD',  400: '#5FC1AE',  500: '#45B39D',  600: '#358B79',  700: '#266256',  800: '#163A32',  900: '#07110F',  950: '#000000'},
                secondary: {  DEFAULT: '#F1948A',  50: '#FDF2F0',  100: '#FCE7E5',  200: '#F9D2CE',  300: '#F6BEB8',  400: '#F4A9A1',  500: '#F1948A',  600: '#EB6658',  700: '#E53826',  800: '#BC2717',  900: '#8A1C11',  950: '#71170E'},
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
