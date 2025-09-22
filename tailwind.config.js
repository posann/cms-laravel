// import preset from "./vendor/filament/support/tailwind.config.preset";

/** @type {import('tailwindcss').Config} */

export default {
    // presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1440px',
        },
        extend: {
            fontFamily: {
                'sans': ['Roboto Flex', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif'],
                'roboto': ['Roboto Flex', 'sans-serif'],
            },
            colors: {
                primary: {
                    50: '#FFFEF0',
                    100: '#FFFCDB',
                    200: '#FFF9B7',
                    300: '#FFF693',
                    400: '#FFF26F',
                    500: '#FFEF4B',
                    600: '#FFEB27',
                    700: '#FEE50E', // base primary
                    800: '#E6CF0D',
                    900: '#B3A00A',
                },
                secondary: {
                    50: '#FFFBEB',
                    100: '#FFF6D6',
                    200: '#FFEDAD',
                    300: '#FFE585',
                    400: '#FFDC5C',
                    500: '#FFD333',
                    600: '#FFC903', // base secondary
                    700: '#E6B500',
                    800: '#BF9600',
                    900: '#997800',
                },
                background: {
                    white: '#FFFFFF',
                    wheat: '#F9F6F0',
                    light: '#F5F1E8',
                    subtle: '#EDE7DB',
                },
                success: '#10B981',
                error: '#EF4444',
                warning: '#F59E0B',
                info: '#3B82F6',
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
