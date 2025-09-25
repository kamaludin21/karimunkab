import Alpine from "alpinejs";
import focus from "@alpinejs/focus";

import "./modal.js";
import { share } from "./share";
import { copyToClipboard } from "./clipboard";

window.copyToClipboard = copyToClipboard;
window.share = share;

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

Alpine.start();
