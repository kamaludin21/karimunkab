@php
  $document = App\Models\Document::with('author')->where('slug', $slug)->firstOrFail();
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <script src="https://mozilla.github.io/pdf.js/build/pdf.mjs" type="module"></script>
  <script type="module">
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    const url = @json(asset('storage/' . $document->file));

    // Loaded via <script> tag, create shortcut to access PDF.js exports.
    var {
      pdfjsLib
    } = globalThis;

    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.mjs';

    let pdfDoc = null,
      pageNum = 1,
      pageRendering = false,
      pageNumPending = null,
      baseScale = 1, // skala awal (ditentukan dari tinggi 384px)
      currentScale = 1, // skala aktif (dipakai untuk zoom in/out)
      canvas = document.getElementById('the-canvas'),
      ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num) {
      pageRendering = true;
      pdfDoc.getPage(num).then(function(page) {
        const targetHeight = 384; // h-96
        const viewport = page.getViewport({
          scale: 1
        });

        // hitung base scale sekali
        if (baseScale === 1) {
          baseScale = targetHeight / viewport.height;
          currentScale = baseScale;
        }

        // apply current scale
        const scaledViewport = page.getViewport({
          scale: currentScale
        });

        // HiDPI render
        const outputScale = window.devicePixelRatio || 1;
        canvas.width = scaledViewport.width * outputScale;
        canvas.height = scaledViewport.height * outputScale;

        canvas.style.width = scaledViewport.width + "px";
        canvas.style.height = scaledViewport.height + "px";

        const transform = outputScale !== 1 ? [outputScale, 0, 0, outputScale, 0, 0] : null;

        const renderContext = {
          canvasContext: ctx,
          viewport: scaledViewport,
          transform: transform
        };

        const renderTask = page.render(renderContext);
        renderTask.promise.then(function() {
          pageRendering = false;
          if (pageNumPending !== null) {
            renderPage(pageNumPending);
            pageNumPending = null;
          }
        });
      });

      document.getElementById("page_num").textContent = num;
    }

    function zoomIn() {
      currentScale *= 1.2; // tambah 20%
      queueRenderPage(pageNum);
    }

    function zoomOut() {
      currentScale /= 1.2; // kurang 20%
      queueRenderPage(pageNum);
    }

    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
      if (pageRendering) {
        pageNumPending = num;
      } else {
        renderPage(num);
      }
    }

    /**
     * Displays previous page.
     */
    function onPrevPage() {
      if (pageNum <= 1) {
        return;
      }
      pageNum--;
      queueRenderPage(pageNum);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
     * Displays next page.
     */
    function onNextPage() {
      if (pageNum >= pdfDoc.numPages) {
        return;
      }
      pageNum++;
      queueRenderPage(pageNum);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

    /**
     * Asynchronously downloads PDF.
     */
    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
      pdfDoc = pdfDoc_;
      document.getElementById('page_count').textContent = pdfDoc.numPages;
      document.getElementById('zoomIn').addEventListener('click', zoomIn);
      document.getElementById('zoomOut').addEventListener('click', zoomOut);

      // Initial/first page rendering
      renderPage(pageNum);
    });
  </script>
  <div class=" w-full bg-white">
    <div class="max-w-screen-lg mx-auto w-full space-y-6 py-16 px-2">
      {{-- Breadcrumbs --}}
      <ul class="text-center w-1/2 flex gap-2 justify-start">
        <li class="text-xl font-medium text-slate-600"><a href="/" class="hover:underline">
            Beranda</a></li>
        <li class="text-xl font-medium text-slate-600">/</li>
        <li class="text-xl font-medium text-slate-600 whitespace-nowrap"><a href="/publikasi-dokumen"
            class="hover:underline">
            Publikasi Dokumen</a></li>
        <li class="text-xl font-medium text-slate-600">/</li>
        <li class="text-xl font-medium text-orange-600 truncate">{{ $document->title }}</li>
      </ul>
      {{-- Breadcrumbs --}}

      <div class="flex gap-2 ring ring-slate-200 rounded-lg overflow-hidden p-0.5">

        <div class="w-1/3 p-4 h-auto flex flex-col">
          <div class="space-y-3 flex-1">
            <p class="text-lg text-slate-600">Informasi Dokumen</p>
            <hr class="border-t border-slate-200">

            <div>
              <p class="text-slate-400 text-sm font-medium">Judul</p>
              <p class="text-base font-medium text-slate-700 leading-6">{{ $document->title }}</p>
            </div>

            <div>
              <p class="text-slate-400 text-sm font-medium">Pemilik</p>
              <p class="text-base font-medium text-slate-700 leading-6">{{ $document->author->name }}</p>
            </div>

            <div>
              <p class="text-slate-400 text-sm font-medium">Tanggal Publikasi</p>
              <p class="text-base font-medium text-slate-700 leading-6">
                {{ \Carbon\Carbon::parse($document->published_at)->isoFormat('D MMMM Y') }}
              </p>
            </div>

            <div>
              <p class="text-slate-400 text-sm font-medium">Ukuran File</p>
              <p class="text-base font-medium text-slate-700 leading-6">
                {{ $document->size ?? 'Tidak ditemukan' }}
              </p>
            </div>
          </div>

          <!-- Tombol aksi selalu di bawah -->
          <div class="flex flex-col md:flex-row gap-2 font-medium pt-4">
            {{-- <a href="javascript:void(0)"
              class="text-white gap-1 bg-orange-600 p-2 flex-0 rounded-lg active:scale-95 flex items-center justify-center">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="h-6 w-auto">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M8.7 10.7l6.6 -3.4" />
                <path d="M8.7 13.3l6.6 3.4" />
              </svg>
            </a> --}}
            <a href="{{ asset('storage/' . $document->file) }}" download
              class="flex items-center justify-center gap-1 border border-slate-400 text-slate-600 py-1.5 px-2 flex-1 rounded-lg active:scale-95 hover:bg-slate-200 duration-200">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                stroke-linejoin="round" class="h-6 w-auto">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                <path d="M7 11l5 5l5 -5" />
                <path d="M12 4l0 12" />
              </svg>
              <span>Unduh</span>
            </a>
          </div>
        </div>
        <div class="w-2/3 h-auto bg-slate-200 rounded-lg p-4 gap-2 relative flex justify-center items-center">
          <div class="h-96 flex items-center justify-center">
            <div class="text-slate-600 flex items-center justify-center flex-col gap-2">
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 ">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005zm2.571 15.18a4.5 4.5 0 0 0 -5.142 0a1 1 0 1 0 1.142 1.64a2.5 2.5 0 0 1 2.858 0a1 1 0 0 0 1.142 -1.64m-4.565 -5.18h-.011a1 1 0 0 0 0 2h.01a1 1 0 0 0 0 -2m4 0h-.011a1 1 0 0 0 0 2h.01a1 1 0 0 0 0 -2" />
                <path d="M19 7h-4l-.001 -4.001z" />
              </svg>
              <p>Tidak bisa menampilkan dokumen</p>
            </div>
            {{-- <canvas id="the-canvas" class="w-auto mx-auto"></canvas> --}}
          </div>
          {{-- <div class="absolute bg-white px-2 py-1 rounded-t-md mx-auto bottom-0">
            <button id="prev">Previous</button>
            <span><span id="page_num"></span> / <span id="page_count"></span></span>
            <button id="next">Next</button>
            &nbsp; &nbsp;
            <button id="zoomIn">Zoom In</button>
            <button id="zoomOut">Zoom Out</button>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
