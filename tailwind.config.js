import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php', // <--- INI WAJIB (Men-scan semua folder views)
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
             colors: {
                        gym: {
                            50: '#fff1f2',  
                            100: '#ffe4e6',
                            200: '#fecdd3',
                            500: '#f43f5e',
                            600: '#e11d48', // Merah Utama (Primary)
                            700: '#be123c', // Merah Gelap (Hover)
                            800: '#9f1239',
                            900: '#881337', // Merah Sangat Gelap (Sidebar)
                            950: '#4c0519',
                        },
                        dark: {
                            900: '#0f172a', // Sidebar Background
                            800: '#1e293b',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                
        },
    },

    plugins: [forms],
};
