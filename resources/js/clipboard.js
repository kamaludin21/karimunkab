export function copyToClipboard(text) {
  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard
      .writeText(text)
      .then(() => showCopiedNotif())
      .catch((err) => {
        console.error("Clipboard error:", err);
      });
  } else {
    const textarea = document.createElement("textarea");
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    try {
      // @ts-ignore execCommand is deprecated, used only as fallback
      document.execCommand("copy");
      showCopiedNotif();
    } catch (err) {
      console.error("Fallback copy error:", err);
    }
    document.body.removeChild(textarea);
  }
}

function showCopiedNotif() {
  if (window.Alpine) {
    Alpine.store('clipboard').setCopied();
  }
}
