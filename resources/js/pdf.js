window.openPDF = function (button) {
  const file = button.dataset.file;
  const viewerUrl = `https://docs.google.com/gview?url=${encodeURIComponent(file)}&embedded=true`;
  document.getElementById("pdf-frame").src = viewerUrl;
  if (window.Alpine && Alpine.store("modal")) {
    console.log(file);
    Alpine.store("modal").open("preview-pdf");
  } else {
    console.warn("Alpine modal store not found");
  }
};
