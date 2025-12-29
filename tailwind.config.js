/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/**/*.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Poppins', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [],
    safelist: [
        'glass',
        'gradient-text',
        'hover-scale',
        'btn-ripple',
        'animate-fade-in-up',
        'mobile-menu',
    ],
}
