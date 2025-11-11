@php
  use App\Models\Institute;
  use App\Models\Document;

  $institutes = Institute::orderBy('name')->get();
  $doc = Document::where('slug', $slug)->firstOrFail();
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <section class="max-w-screen-lg mx-auto w-full py-0 lg:py-6 space-y-6 min-h-[60vh] mb-16">
    {{-- Container Utama --}}
    <div class="rounded-none md:rounded-lg bg-white ring-1 ring-slate-200">
      <div class="px-4 py-5 border-b border-slate-200 flex items-center gap-2 text-slate-600">
        <a href="/publikasi-dokumen/skpd/{{ $doc->institute->slug }}" class="p-1 rounded-md bg-slate-100 hover:bg-slate-200">
          <x-icons.bullet-list class="h-5 w-auto stroke-2" />
        </a>
        <p class="text-lg font-medium line-clamp-1">
          Informasi Dokumen
        </p>
      </div>
      <div class="flex flex-col md:flex-row">
        {{-- Detail Docs --}}
        <div class="w-full md:w-2/5 p-4 space-y-6 border-r border-slate-200">
          <h1 class="text-2xl font-medium text-slate-600">
            {{ $doc->title }}
          </h1>
          <div class="space-y-4">
            <div>
              <p class="text-sm font-light text-slate-400">Oleh</p>
              <p class="text-base font-medium text-slate-500">{{ $doc->institute->name }}</p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Publikasi</p>
              <p class="text-base font-medium text-slate-500">{{ $doc->published_at->isoFormat('D MMMM Y') }}</p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Terakhir diperbarui</p>
              <p class="text-base font-medium text-slate-500">{{ $doc->updated_at->isoFormat('D MMMM Y') }}</p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Ukuran File</p>
              <p class="text-base font-medium text-slate-500">{{ $doc->size }}</p>
            </div>
            <div>
              <p class="text-sm font-light text-slate-400">Jenis File</p>
              <p class="text-base font-medium text-slate-500 uppercase">{{ $doc->file_type }}</p>
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
        <div class="w-full md:w-3/5 overflow-hidden min-h-96 h-[85vh] relative">
          <object class="pdf" data="{{ asset('storage/' . $doc->file) }}" width="100%" height="100%">
          </object>
        </div>

      </div>
    </div>
  </section>
@endsection

@push('scripts')
  @vite(['resources/js/pdf.js'])
@endpush
