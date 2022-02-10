const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        '../wind-pkg/resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
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
