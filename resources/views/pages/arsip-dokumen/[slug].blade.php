@php
  $document = App\Models\Document::with('author')->where('slug', $slug)->firstOrFail();
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <div class=" w-full bg-white">
    <div class="max-w-screen-lg mx-auto w-full space-y-6 py-16 px-2">
      {{-- Breadcrumbs --}}
      <ul class="text-center flex gap-2 justify-center">
        <li class="text-xl font-medium text-slate-600"><a href="/" class="hover:underline">
            Beranda</a></li>
        <li class="text-xl font-medium text-slate-600">/</li>
        <li class="text-xl font-medium text-orange-600">Publikasi Dokumen</li>
      </ul>
      {{-- Breadcrumbs --}}

      <div class="flex gap-2 ring ring-slate-200 rounded-lg overflow-hidden p-0.5">

        <div class="w-1/3 space-y-2  p-4  h-full">
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
              {{ \Carbon\Carbon::parse($document->published_at)->isoFormat('D MMMM Y') }}</p>
          </div>

          <div>
            <p class="text-slate-400 text-sm font-medium">Ukuran File</p>
            <p class="text-base font-medium text-slate-700 leading-6">
              {{ $document->size ?? 'Tidak ditemukan' }}
            </p>
          </div>

          <div class="flex flex-col md:flex-row gap-2 font-medium">
            <a href="/"
              class="text-center text-slate-700 gap-1 border border-slate-400 py-1.5 px-2 flex-1 rounded-lg active:scale-95">
              Bagikan
            </a>
            <a href="/" target="_blank"
              class="flex items-center justify-center gap-1 bg-orange-600 text-white py-1.5 px-2 flex-1 rounded-lg active:scale-95">
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


        <div class="w-2/3 h-[32vw] bg-slate-200 rounded-lg flex p-4 gap-2">
          <img src="{{ asset('assets/images/pdf.png') }}" class="flex-1 h-auto object-contain" alt="">
          {{-- <img src="{{ asset('assets/images/pdf.png') }}" class="flex-1 h-auto object-contain" alt=""> --}}
        </div>



      </div>


    </div>
  </div>
@endsection
