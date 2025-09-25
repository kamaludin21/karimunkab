import { popupCenter } from "./popup";

export const share = {
  facebook(pageUrl) {
    const api = "https://www.facebook.com/sharer/sharer.php?u=";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "Facebook Share", 480, 320);
  },
  x(pageUrl) {
    const api = "https://x.com/intent/post?url=";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "X Share", 600, 400);
  },
};
