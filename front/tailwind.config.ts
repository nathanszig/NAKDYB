export default {
  content: [
    "./app.vue",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./components/**/*.vue",
  ],
  safelist: [],
  theme: {
    extend: {
      maxWidth: {
        content: "1440px",
      },
    },
    colors: {
      black: "#070707",
      white: "#FFFFFF",
      player: "#BF7E00",
      admin: "#00B6BF",
      danger: "#FF0000",
      none: "transparent",
      current: "currentcolor",
    },
    fontFamily: {
      "f-default": ["Inter", "Avenir", "Helvetica", "Arial", "sans-serif"],
      "f-title": ["Inter", "Avenir", "Helvetica", "Arial", "sans-serif"],
      "f-button": ["Inter", "Avenir", "Helvetica", "Arial", "sans-serif"],
    },
    fontSize: {
      xs: ["14px"],
      sm: ["16px"],
      base: ["18px"],
      md: ["20px"],
      lg: ["32px"],
      xl: ["40px"],
      "2xl": ["48px"],
    },
    borderRadius: {
      none: "0",
      DEFAULT: "4px",
      full: "9999px",
    },
    screens: {
      "2xs": "400px",
      xs: "500px",
      sm: "600px",
      md: "750px",
      lg: "1000px",
      xl: "1250px",
      "2xl": "1400px",
    },
  },
};
