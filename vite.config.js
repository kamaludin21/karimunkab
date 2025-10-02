import path from "path";
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/js/pdf.js",
      ],
      refresh: true,
    }),
    tailwindcss(),
  ],
  resolve: {
    alias: {
      "~font": path.resolve(__dirname, "resources/assets/fonts"),
    },
  },
});
