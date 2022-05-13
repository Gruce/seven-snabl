const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')


module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],

    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Noto Kufi Arabic', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
