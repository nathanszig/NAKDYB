// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  ssr: false,

  // Modules
  modules: ["@nuxtjs/tailwindcss"],

  // Environment variables
  runtimeConfig: {
    public: {
      API_ENDPOINT: process.env.API_ENDPOINT,
    },
  },

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
  components: [
    {
      path: '~/components/atom',
    },
    {
      path: '~/components/base',
    },
    {
      path: '~/components/molecule',
    },
    {
      path: '~/components/organism',
    },
    {
      path: '~/components/template',
    },
  ],
});
