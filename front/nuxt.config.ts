// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  ssr: false,

  // Modules
  modules: ["@nuxtjs/tailwindcss"],

  // SCSS
  css: ["@/assets/scss/main.scss"],
  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: `@use "@/assets/scss/utils/variables.scss" as *;`,
        },
      },
    },
  },
});
