export function isMobile() {
  return /Android|iPhone|iPad|iPod|Opera Mini|IEMobile|WPDesktop/i.test(navigator.userAgent);
}

export const popupCenter = (url, title, w, h) => {
  const dualScreenLeft =
    window.screenLeft !== undefined ? window.screenLeft : window.screenX;
  const dualScreenTop =
    window.screenTop !== undefined ? window.screenTop : window.screenY;

  const availWidth = window.screen.availWidth;
  const availHeight = window.screen.availHeight;

  const left = dualScreenLeft + (availWidth - w) / 2;
  const top = dualScreenTop + (availHeight - h) / 2;

  window.open(
    url,
    title,
    `scrollbars=yes,width=${w},height=${h},top=${top},left=${left}`,
  );
};
