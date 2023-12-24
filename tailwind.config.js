import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from 'tailwindcss/colors';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
        './storage/framework/views/*.php',
        "./node_modules/flowbite/**/*.js",
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            primary: colors.slate[100],
            secondary: colors.gray[200],
            accent: colors.emerald[500],
            'primary-dark': colors.slate[900],
            'secondary-dark': colors.gray[800],
            'accent-dark': colors.emerald[600],
            ...colors
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require('flowbite'), require('tailwind-scrollbar-hide')],
};
