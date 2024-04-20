import path from "path";
import Vue from "@vitejs/plugin-vue";
import liveReload from "vite-plugin-live-reload";
import symfonyPlugin from "vite-plugin-symfony";
import {defineConfig} from "vite";
import VitePluginVueDevTools from "vite-plugin-vue-devtools";
import {fileURLToPath} from "node:url";
const __dirname = path.resolve(path.dirname(""));

// https://vitejs.dev/config/
export default defineConfig({
  publicDir: false,
  plugins: [
    symfonyPlugin({
      viteDevServerHostname: "localhost",
    }),
    Vue({}),
    liveReload([
      "./_application/SymfonyBeyondCrud/Infrastructure/*/Controller/**/*.php",
    ]),
    VitePluginVueDevTools(),
  ],
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-bundler.js",
      '@': fileURLToPath(new URL('./_frontend/src', import.meta.url))
    }
  },
  // devServer: "localhost",
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
