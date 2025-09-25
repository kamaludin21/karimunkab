import { popupCenter } from "./popup";

export const share = {
  facebook(pageUrl) {
    const api = "https://www.facebook.com/sharer/sharer.php?u=";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "Facebook Share", 480, 320);
  },
  x(pageUrl) {
    // const api = "https://x.com/intent/post?url=";
    const api = "https://x.com/intent/tweet?text=https://karimunkab.go.id/berita/baca/upacara-hari-perhubungan-nasional-2025-di-kabupaten-karimun-dipimpin-wabup-rocky-marciano-bawole";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "X Share", 480, 320);
  },
};
