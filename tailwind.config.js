/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.{php,html}", "./public/**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
};
