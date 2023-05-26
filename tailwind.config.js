import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Playfair Display', ...defaultTheme.fontFamily.serif],
               
            },
            colors: {
                'Primario': '#EFA39C',
                'Secundario': '#FFA2A2',
                'Adicional': ' #FE0895',
            },
        },
    },

    plugins: [forms, typography],
};
