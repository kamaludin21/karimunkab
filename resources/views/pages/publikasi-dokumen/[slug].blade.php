@php
  $document = App\Models\Document::with('author')->where('slug', $slug)->firstOrFail();
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <div class="px-2 lg:px-0 w-full bg-white">
    <div class="max-w-screen-lg mx-auto w-full space-y-6 py-6 md:py-10">
      {{-- Breadcrumbs --}}
      <div class="px-2 lg:px-0 py-2 w-full flex gap-0.5 items-center text-slate-500 overflow-hidden text-sm">
        <a href="/publikasi-dokumen" class="flex gap-1 items-center hover:underline cursor-pointer whitespace-nowrap">
          <span>Publikasi Dokumen</span>
        </a>
        <div>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="w-4 h-4">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 6l6 6l-6 6" />
          </svg>
        </div>
        <a href="/publikasi-dokumen" class="flex gap-1 items-center hover:underline cursor-pointer">
          <span>{{ $document->author->name }}</span>
        </a>
        <div>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="w-4 h-4">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 6l6 6l-6 6" />
          </svg>
        </div>
        <a href="javascript:void(0)" class="flex gap-1 items-center hover:underline cursor-pointer text-slate-700">
          <span class="line-clamp-1">{{ \Illuminate\Support\Str::limit($document->title, 25) }}</span>
        </a>
      </div>
      {{-- Breadcrumbs --}}

      <div class="flex flex-col md:flex-row gap-2 ring ring-slate-200 rounded-lg overflow-hidden p-0.5">

        <div class="w-full md:w-1/3 p-4 h-auto flex flex-col">
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

          <div class="flex flex-col md:flex-row gap-2 font-medium pt-4">
            <a href="javascript:void(0)"
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
            </a>
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
        <div class="w-full md:w-2/3 h-[80vh] bg-slate-200 rounded-lg p-0 relative overflow-hidden">
          <div id="pdf-loader" class="absolute inset-0 flex items-center justify-center bg-white/70 z-10">
            <div class="animate-spin rounded-full h-12 w-12 border-4 border-slate-400 border-t-transparent"></div>
          </div>
          <div id="viewer" class="w-full h-full"></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  @vite('resources/js/pdf.js')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      initPDFViewer().then(instance => {
        instance.UI.loadDocument("{{ asset('storage/' . $document->file) }}");
      });
    });
  </script>
@endpush
