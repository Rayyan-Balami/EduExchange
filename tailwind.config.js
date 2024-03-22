/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {

        },
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#4a00ff",
                    secondary: "#ff00d3",
                    accent: "#00d7c0",
                    neutral: "#2b3440",
                    "base-100": "#ffffff",
                    info: "#00b5ff",
                    success: "#9affdc",
                    warning: "#ffbe00",
                    error: "#ff5861",
                },
            },
        ],
    },
    plugins: [
        require('flowbite/plugin'),
        require("daisyui"),
    ],
};

