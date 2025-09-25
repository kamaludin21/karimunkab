import { popupCenter } from './popup'

export const share = {
  facebook(pageUrl) {
    const api = "https://www.facebook.com/sharer/sharer.php?u=";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "Facebook Share", 600, 400);
  },
  x(pageUrl) {
    const navUrl =
      "https://x.com/intent/post?url=" + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "X Share", 600, 400);
  },
};
