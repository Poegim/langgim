const defaultTheme = require('tailwindcss/defaultTheme');
const customWidths = {};

for (let width = 1; width <= 100; width++) {
    customWidths[`${width}p`] = `${width}%`;
}

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            width: {
                ...customWidths,
                '0p': '0px',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
    safelist: [
        'bg-gray-400',
        'bg-gray-200',
        'bg-white',
        ...Object.keys(customWidths),
    ],

};
