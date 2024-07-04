/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/executive/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'login-bg': "url('/resources/css/img/login-bg.png')",
      },
      fontFamily: {
        'times': ['Times New Roman', 'Times', 'serif'],
      },
      colors: {
        customGreen: '#BF9D49',
        TiffanyBlue: '#A0E7E5',
        HotPink: '#FFAEBC',
        Mint: '#B4F8C8',
        customYellow: '#FBE7C6'
      }
    },
  },
  plugins: [],
}