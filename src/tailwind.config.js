/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["../**/*.{php, html}", './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    fontFamily: { 
      Primary: ["Quicksand", "sans-serif"],
      Secondary: ["Poppins", "sans-serif"],
    },
    extend: {
      colors:{
        green: "#68C453", 
        "green-light": "#E2FBDB", // usado como bg
        orange:"#FFAB37",
        "orange-dark":"#F89838",
        "orange-accent":"#FF8710",
        purple:"#D28CE6",
        pink: "#FD82AC",
        blue: "#8CD2FF",
        yellow: "#FFBC00",
        gray: "#F4F4F4",
        dark: "#606060",
        // principal colors
        primary: "#606060", // dark
        secondary:"#68C453", // green
        accent:"#FFAB37" // orange
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
