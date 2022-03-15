module.exports = {
  purge: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  content: [],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
