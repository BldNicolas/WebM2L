import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Pink Sunset', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'one': '#8ECAE6',
                'two': '#219EBC',
                'three': '#023047',
                'four': '#FFB703',
                'five': '#FB8500',
            },
            backgroundImage: {
                'default-bg': "url('/background.jpeg')",
            },
            lineHeight: {
                'inherit': 'inherit',
            },
        },
    },

    plugins: [forms],
};
