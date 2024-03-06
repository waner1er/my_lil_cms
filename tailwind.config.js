import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


function lightenColor(color, percent) {
    var num = parseInt(color.replace("#", ""), 16),
        amt = Math.round(2.55 * percent),
        R = (num >> 16) + amt,
        B = ((num >> 8) & 0x00FF) + amt,
        G = (num & 0x0000FF) + amt;
    return "#" + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 + (B < 255 ? B < 1 ? 0 : B : 255) * 0x100 + (G < 255 ? G < 1 ? 0 : G : 255)).toString(16).slice(1);
}
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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("daisyui")],
    daisyui: {
        themes: [
            {
                pinky: {
                    "primary": "#FF9CCB",
                    "primary-content": "#7DE8CA",
                    "secondary": "#FF9CCB",
                    "secondary-content": lightenColor("#FF9CCB", 50),
                    "accent": "#FF4800",
                    "accent-content": lightenColor("#FF4800", 50),
                    "neutral": "#F80151",
                    "neutral-content": lightenColor("#F80151", 50),
                    "base-100": lightenColor("#FF9CCB", 30),
                    "base-200": lightenColor("#FF9CCB", 10),
                    "base-300": lightenColor("#FF4800", 10),
                    "base-content": lightenColor("#F80151", 10),
                    "info": "#7DE8CA",
                    "info-content": lightenColor("#7DE8CA", 80),
                    "success": "#FF9CCB",
                    "success-content": lightenColor("#FF9CCB", 80),
                    "warning": "#FF4800",
                    "warning-content": lightenColor("#FF4800", 80),
                    "error": "#F80151",
                    "error-content": lightenColor("#F80151", 80),
                },
            },
            "light", "dark", "cupcake", "valentine"],
    },
};
