const colors       = require('tailwindcss/colors')

module.exports = {
    purge:    [
        './resources/views/**/*.blade.php',
        './resources/css/app.css',
    ],
    theme:    {
        colors: {
            transparent: 'transparent',
            current:     'currentColor',
            white:       colors.white,
            gray:        colors.warmGray,
            yellow:      colors.yellow,
            green:       colors.green,
            red:         colors.rose,
            primary:     colors.emerald,
            secondary:   colors.amber,
        },
        extend: {
            colors: {
                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,
            },
            transitionProperty: {
                'width': 'width',
            }
        },
    },
    variants: {
        extend: {
            ringWidth:       ['hover'],
            ringColor:       ['hover'],
            backgroundColor: ["checked", "hover"],
            borderColor:     ["checked", "hover"],
            inset:           ["checked"],
            zIndex:          ["hover", "active"],
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms')
    ],
};