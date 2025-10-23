window.viewPDF = function (button) {
  const file = button.dataset.file;
  document.getElementById("pdf-object").data = file;
  if (window.Alpine && Alpine.store("modal")) {
    Alpine.store("modal").open("preview-pdf");
  } else {
    console.warn("Alpine modal store not found");
  }
};
