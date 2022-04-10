const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        '../wind-pkg/resources/views/**/*.blade.php',
        '../sky-pkg/resources/views/**/*.blade.php',
        '../bolt-pkg/resources/views/**/*.blade.php',

        './vendor/filament/**/*.blade.php',

        '../wind/resources/views/**/*.blade.php',
        '../sky/resources/views/**/*.blade.php',
        '../bolt/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                gray: colors.zinc,
                primary: colors.green,
                secondary: colors.yellow,
                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms')
    ],
};
