const colors       = require('tailwindcss/colors')

module.exports = {
    content:    [
        './resources/views/**/*.blade.php',
        './resources/css/app.css',
    ],
    theme:    {
        extend: {
            colors: {
                primary:     colors.yellow,
                secondary:   colors.green,
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
