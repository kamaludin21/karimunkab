import PDFJSExpress from "@pdftron/pdfjs-express-viewer";

export function initPDFViewer(fileUrl) {
  const licenseKey = import.meta.env.VITE_PDFJS_KEY;
  const loader = document.getElementById("pdf-loader");

  return PDFJSExpress(
    {
      path: "/pdfjsexpress",
      licenseKey,
      initialDoc: fileUrl || undefined,
    },
    document.getElementById("viewer"),
  )
    .then((instance) => {
      if (loader) {
        loader.style.display = "none";
      }
      if (fileUrl) {
        instance.UI.loadDocument(fileUrl).then(() => {
          if (loader) loader.style.display = "none";
        });
      }
      return instance;
    })
    .catch((err) => {
      console.error("PDF.js Express gagal load", err);
      if (loader)
        loader.innerHTML = "<p class='text-red-500'>Gagal memuat PDF</p>";
    });
}

window.initPDFViewer = initPDFViewer;
