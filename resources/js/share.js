import { popupCenter } from "./popup";

export const share = {
  facebook(pageUrl) {
    const api = "https://www.facebook.com/sharer/sharer.php?u=";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "Facebook Share", 580, 400);
  },
  x(pageUrl, message = "") {
    const api = "https://x.com/intent/post?";
    const params = new URLSearchParams({ url: pageUrl });
    if (message) params.append("text", message);
    const navUrl = api + params.toString();
    popupCenter(navUrl, "X Share", 580, 400);
  },
  whatsapp(pageUrl, message = "") {
    const api = "https://api.whatsapp.com/send?";
    const text = message ? `${message}\n\n${pageUrl}` : pageUrl;
    const params = new URLSearchParams({ text });
    const navUrl = api + params.toString();
    popupCenter(navUrl, "WhatsApp Share", 580, 400);
  },
};
