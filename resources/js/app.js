import Alpine from "alpinejs";
import focus from "@alpinejs/focus";

import "./modal.js";
import './pdf.js';
import { share } from "./share";
import { copyToClipboard } from "./clipboard";
import { popupSlider } from "./popupSlider";
// import { openPDF, initPreviewPDF } from "./previewPdf";

window.copyToClipboard = copyToClipboard;
window.popupSlider = popupSlider;
window.share = share;
window.openPDF = openPDF;

Alpine.plugin(focus);
window.Alpine = Alpine;

Alpine.store("clipboard", {
  copied: false,
  setCopied() {
    this.copied = true;
    setTimeout(() => {
      this.copied = false;
    }, 2000);
  },
});

// document.addEventListener("DOMContentLoaded", () => {
//   initPreviewPDF();
// });

Alpine.start();
