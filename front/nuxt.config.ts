// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  css: ['@/assets/scss/main.scss'],
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
      //path: '~/components',
      //pathPrefix: false,
    },
    {
      path: '~/components/molecule',
      //path: '~/components',
      //pathPrefix: false,
    },
  ],
})
