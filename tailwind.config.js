/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    // These paths are just examples, customize them to match your project structure
    purge: [  "./resources/views/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",],
  theme: {
    extend: {},
  },
  plugins: [],
}
