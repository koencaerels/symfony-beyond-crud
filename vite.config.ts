import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import VueDevTools from 'vite-plugin-vue-devtools'
import liveReload from "vite-plugin-live-reload";
import symfonyPlugin from "vite-plugin-symfony";
const __dirname = path.resolve(path.dirname(""));

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    symfonyPlugin({
      viteDevServerHostname: "localhost",
    }),
    liveReload([
      "./_application/SymfonyBeyondCrud/Infrastructure/*/Controller/**/*.php",
    ]),
    vue(),
    VueDevTools(),
  ],
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-bundler.js",
      '@': fileURLToPath(new URL('./_frontend/src', import.meta.url))
    }
  },
  devServer: "localhost",
  build: {
    manifest: true,
    outDir: "public/build/",
    rollupOptions: {
      input: {
        app: "./_frontend/src/main.ts",
        tailwind: "./_frontend/src/assets/tailwind.css",
      },
    },
  },
})
