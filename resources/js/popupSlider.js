export function popupSlider() {
  return {
    open: true,
    currentIndex: 0,
    items: [],
    init() {
      // Inisialisasi otomatis dari data HTML (opsional)
      if (this.$el.hasAttribute("data-items")) {
        try {
          this.items = JSON.parse(this.$el.getAttribute("data-items"));
        } catch (e) {
          console.error("Invalid JSON in data-items:", e);
        }
      }
    },
    resolveImageUrl(url) {
      if (!url) return "";
      if (url.startsWith("http://") || url.startsWith("https://")) return url;
      return window.location.origin + url;
    },
    next() {
      if (this.currentIndex < this.items.length - 1) this.currentIndex++;
    },
    prev() {
      if (this.currentIndex > 0) this.currentIndex--;
    },
  };
}
