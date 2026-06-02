/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                arch: {
                    dark: '#0F0B1C',
                    'dark-2': '#111433',
                    'dark-3': '#0F0F27',
                    'dark-4': '#0F0C20',
                    'dark-5': '#100D21',
                    muted: '#4C3E63',
                    pink: '#FF2D95',
                    'pink-light': '#FF4DB8',
                    purple: '#9B4DFF',
                    blue: '#2F7BFF',
                    cyan: '#00C2FF',
                    orange: '#FF7A18',
                    yellow: '#FFC107',
                },
            },
            fontFamily: {
                sans: ['Inter', 'Figtree', 'system-ui', 'sans-serif'],
                display: ['Inter', 'system-ui', 'sans-serif'],
            },
            animation: {
                'gradient': 'gradient 8s ease infinite',
                'float': 'float 6s ease-in-out infinite',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'glow': 'glow 2s ease-in-out infinite alternate',
                'grid': 'grid 20s linear infinite',
            },
            keyframes: {
                gradient: {
                    '0%, 100%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                glow: {
                    '0%': { boxShadow: '0 0 20px rgba(155, 77, 255, 0.3)' },
                    '100%': { boxShadow: '0 0 40px rgba(155, 77, 255, 0.6)' },
                },
                grid: {
                    '0%': { transform: 'translateY(0)' },
                    '100%': { transform: 'translateY(-100%)' },
                },
            },
            backgroundSize: {
                '300%': '300% 300%',
            },
        },
    },
    plugins: [],
};
