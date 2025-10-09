// resources/js/previewPdf.js

let pdfInstance = null;

/**
 * Inisialisasi viewer PDF
 */
export async function initPreviewPDF() {
  if (!pdfInstance) {
    pdfInstance = await initPDFViewer();
  }
}

/**
 * Buka modal dan tampilkan file PDF + info dokumen
 * @param {HTMLElement} button
 */
export async function openPDF(button) {
  const fileUrl = button.getAttribute("data-file");
  const title = button.getAttribute("data-title");
  const org = button.getAttribute("data-org");
  const date = button.getAttribute("data-date");
  const size = button.getAttribute("data-size");

  if (!pdfInstance) {
    pdfInstance = await initPDFViewer();
  }

  // Buka modal
  openModal("preview-pdf");

  // Tampilkan dokumen PDF
  pdfInstance.UI.loadDocument(fileUrl);

  // Isi tab informasi dokumen sesuai format Blade
  document.getElementById("info-title").textContent = title || "–";
  document.getElementById("info-org").textContent = org || "–";
  document.getElementById("info-date").textContent = date || "–";
  document.getElementById("info-size").textContent = size || "Tidak ditemukan";
}
