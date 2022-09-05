/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'green-blue': 'linear-gradient(109.6deg, #FCFF81 -18.12%, #C2FF9D 47.7%, #75A4FF 114.98%)',
      },
    },
  },
  plugins: [],
}
