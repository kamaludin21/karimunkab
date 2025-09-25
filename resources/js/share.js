import { popupCenter, isMobile } from "./popup";

export const share = {
  facebook(pageUrl) {
    const api = "https://www.facebook.com/sharer/sharer.php?u=";
    const navUrl = api + encodeURIComponent(pageUrl);
    popupCenter(navUrl, "Facebook Share", 580, 400);
  },
  x(pageUrl, message = "") {
    const encodedMessage = encodeURIComponent(
      message ? message + " " + pageUrl : pageUrl,
    );
    const webUrl = `https://x.com/intent/post?${new URLSearchParams({
      url: pageUrl,
      text: message,
    }).toString()}`;

    if (isMobile()) {
      const appUrl = `twitter://post?message=${encodedMessage}`;
      window.location.href = appUrl;

      setTimeout(() => {
        popupCenter(webUrl, "X Share", 580, 400);
      }, 500);
    } else {
      popupCenter(webUrl, "X Share", 580, 400);
    }
  },

  whatsapp(pageUrl) {
    const api = "https://api.whatsapp.com/send?";
    const text = pageUrl;
    const params = new URLSearchParams({ text });
    const navUrl = api + params.toString();
    popupCenter(navUrl, "WhatsApp Share", 580, 400);
  },
};
