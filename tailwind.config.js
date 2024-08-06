/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
        animation: {
            "loop-scroll": "loop-scroll 50s linear infinite",
        },
        keyframes: {
            "loop-scroll": {
                from: { transform: "translateX(0)"},
                to: { transform: "translateX(-100%)"},
            }
        }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

