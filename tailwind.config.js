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
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'kosmo-darkblue': '#13293D',
                'kosmo-blue': '#265D7A',
                'kosmo-cyan': '#67C7C6',
                'kosmo-lightcyan': '#A7E4DB',
            },
        },
    },

    plugins: [forms],
};
