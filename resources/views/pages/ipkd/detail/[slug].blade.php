@php
  use App\Models\IpkdDoc;
  use App\Models\IpkdYear;

  // Ambil daftar tahun aktif untuk sidebar atau navigasi
  $years = IpkdYear::where('is_active', true)->orderBy('year', 'desc')->get();

  // Cari dokumen berdasarkan slug (IpkdDoc)
  $doc = IpkdDoc::with('year')->where('slug', $slug)->firstOrFail();

  // Ambil tahun dari relasi dokumen
  $activeYear = $doc->year?->year ?? '-';
@endphp

@extends('layouts.app', ['activePage' => 'ipkd'])

@section('content')
  <section class="max-w-screen-lg mx-auto w-full py-0 lg:py-6 space-y-6 min-h-[60vh] mb-16">
    {{-- Kontainer Utama --}}
    <div class="rounded-none md:rounded-lg bg-white ring-1 ring-slate-200">
      {{-- Header --}}
      <div class="px-4 py-5 border-b border-slate-200 flex items-center gap-2 text-slate-600">
        <a href="/ipkd/{{ $activeYear }}" class="p-1 rounded-md bg-slate-100 hover:bg-slate-200">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
            class="h-5 w-auto stroke-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 6h11" />
            <path d="M9 12h11" />
            <path d="M9 18h11" />
            <path d="M5 6l0 .01" />
            <path d="M5 12l0 .01" />
            <path d="M5 18l0 .01" />
          </svg>
        </a>
        <p class="text-lg font-medium line-clamp-1">
          Dokumen IPKD Tahun {{ $activeYear }}
        </p>
      </div>

      <div class="flex flex-col md:flex-row">
        {{-- Detail Dokumen --}}
        <div class="w-full md:w-2/5 p-4 space-y-6 border-r border-slate-200">
          <h1 class="text-2xl font-medium text-slate-600">
            {{ $doc->title }}
          </h1>

          <div class="space-y-4">
            <div>
              <p class="text-sm font-light text-slate-400">Tahun</p>
              <p class="text-base font-medium text-slate-500">{{ $doc->year?->year ?? '-' }}</p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Tanggal Penetapan</p>
              <p class="text-base font-medium text-slate-500">
                {{ optional($doc->determined_at)->translatedFormat('d F Y') ?? '-' }}
              </p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Tanggal Publikasi</p>
              <p class="text-base font-medium text-slate-500">
                {{ optional($doc->published_at)->translatedFormat('d F Y') ?? '-' }}
              </p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Ukuran File</p>
              <p class="text-base font-medium text-slate-500">{{ $doc->size }}</p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Jenis File</p>
              <p class="text-base font-medium text-slate-500">PDF</p>
            </div>
          </div>

          <div x-data="{ downloading: false }">
            <a href="{{ asset('storage/' . $doc->file) }}"
              :class="downloading ? 'bg-gray-400 cursor-not-allowed pointer-events-none' : 'bg-blue-600 hover:bg-blue-700'"
              x-on:click="
      if (downloading) return;
      downloading = true;
      setTimeout(() => downloading = false, 3000);
    "
              download
              class="py-2 gap-1 rounded-lg text-slate-100 w-full flex items-center justify-center transition-colors">
              <x-icons.cloud-download class="w-6 h-auto stroke-2" />
              <span x-text="downloading ? 'Sedang memproses...' : 'Download'"></span>
            </a>
          </div>




        </div>

        {{-- Pratinjau Dokumen --}}
        <div class="w-full md:w-3/5 overflow-hidden min-h-96 h-[85vh] relative">
          {{-- <div class="absolute inset-0 flex items-center justify-center bg-white text-slate-400 text-sm select-none">
            Memuat pratinjau dokumen...
          </div> --}}
          {{-- <iframe src="https://docs.google.com/gview?url=https://karimunkab.go.id/storage/&embedded=true"
            class="h-full w-full rounded-none md:rounded-md relative z-10" frameborder="0"></iframe> --}}
          <object class="pdf" data="{{ asset('storage/' . $doc->file) }}" width="100%" height="100%">
          </object>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  @vite(['resources/js/objectPDF.js'])
@endpush
