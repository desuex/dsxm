import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                amber: {
                    50: '#FFFAF0',
                    100: '#FEEBC8',
                    200: '#FBD38D',
                    300: '#F6AD55',
                    400: '#ED8936',
                    500: '#DD6B20', // Base terminal amber
                    600: '#C05621',
                    700: '#9C4221',
                    800: '#7B341E',
                    900: '#652B19',
                    DEFAULT: '#FFBF00',
                    hover: '#FFC107',
                },
                terminal: {
                    bg: '#101010', // Background
                    fg: '#F6AD55', // Foreground text (amber)
                },
            },
            fontFamily: {
                sans: ['Fira Code', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
