const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                mono: [...defaultTheme.fontFamily.mono],

            },
            colors: {
                danger: colors.red,
                success: colors.emerald,
                info: colors.cyan,
                warning: colors.amber,
            },
            transitionProperty: {
                'stealth': 'margin, padding, background, background-color, color',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
