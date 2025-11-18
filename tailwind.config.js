/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",          // todos los php en la raíz
    "./partials/**/*.php", // si tienes subcarpetas
    "./js/**/*.js",     // si hay clases en JS
  ],
  theme: {
    screens: {
      sm: "576px",
      md: "768px",
      lg: "992px",
      xl: "1200px",
    },
    container: {
      center: true,
      padding: "1rem",
    },
    extend: {
      colors: {
        primary: "#00DEBB",
        newgreen: "#00DEBB",
      },
      backgroundImage: {
        "hero-banner": "url('/image/Banner.jpg')",
      },
      fontFamily: {
        roboto: ["Roboto"],
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
