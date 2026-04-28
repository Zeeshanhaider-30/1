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
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                display: ['"Sora"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                harbor: {
                    paper: '#f3f7ff',
                    cream: '#ffffff',
                    ink: '#0f172a',
                    muted: '#64748b',
                    clay: '#f97316',
                    pine: '#2563eb',
                    sand: '#c7d8ff',
                    sage: '#22c55e',
                    night: '#020617',
                },
            },
        },
    },

    plugins: [forms],
};
