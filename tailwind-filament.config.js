import preset from './vendor/filament/filament/tailwind.config.preset'
import colors from 'tailwindcss/colors'

module.exports = {
    presets: [preset],
    content: [
        // Wind
        '../wind/src/Filament/Resources/LetterResource.php',
        // Sky
        '../sky/resources/views/components/nav-item.blade.php',
        '../sky/resources/views/filament/**/*.blade.php',
        '../sky/src/Models/PostStatus.php',
        // DynamicDashboard
        '../dynamic-dashboard/resources/views/filament/**/*.blade.php',
        '../dynamic-dashboard/src/Models/Columns.php',
        // Rhea
        '../rhea/resources/views/**/*.blade.php',
        // Bolt
        '../bolt/resources/views/filament/**/*.blade.php',
        // Bolt pro
        '../bolt-pro/resources/views/filament/**/*.blade.php',
        // Thunder
        '../thunder/resources/views/**/*.blade.php',
        '../thunder/src/Models/TicketsStatus.php',
        '../thunder/vendor/jaocero/activity-timeline/resources/views/**/*.blade.php',
        // athena
        '../athena/resources/views/filament/**/*.blade.php',
        '../athena/src/Models/RequestStatus.php',
        // hera
        '../hera/resources/views/**/*.blade.php',
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
        require('tailwindcss-debug-screens'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('tailwindcss-debug-screens'),
    ],
};
