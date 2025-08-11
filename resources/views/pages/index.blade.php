@php
  $popup = true;
  $links = App\Models\Link::orderBy('order', 'asc')->limit(5)->get();
  $news = App\Models\News::whereNotNull('published_at')->orderBy('published_at', 'desc')->limit(4)->get();
  $phones = App\Models\ImportantNumber::orderBy('order', 'asc')->limit(6)->get();
  $announcements = App\Models\Announcement::orderBy('published_at', 'desc')->limit(3)->get();
  $documents = App\Models\Document::orderBy('published_at', 'desc')->limit(5)->get();
@endphp

@extends('layouts.app', ['activePage' => 'beranda'])

@section('content')
  <x-sections.hero />
  <x-sections.link :links="$links" />
  <x-sections.berita :news="$news" />
  <x-sections.nomor-penting :phones="$phones" />
  <x-sections.pengumuman :announcements="$announcements" />
  <x-sections.kabar-opd number="6" />
  <x-sections.publikasi-dokumen :documents="$documents" />
  <x-sections.kontak />
@endsection

@if ($popup)
  @push('popup')
    <div x-data="{ open: true }" x-show="open"
      x-effect="
        if (open) {
          document.body.classList.add('overflow-hidden');
        } else {
          document.body.classList.remove('overflow-hidden');
        }
      "
      x-trap.noscroll="open" x-on:keydown.escape.window="open = false"
      class="fixed inset-0 z-[55] flex items-center justify-center bg-black/70" style="display: none;">
      <div @click.away="open = false" class="bg-white rounded-lg shadow-lg max-w-md w-full mx-4 relative overflow-hidden">
        <div class="py-2 pl-4 pr-2 flex justify-between items-center">
          <h2 class="text-xl font-semibold">Himbauan</h2>
          <button @click="open = false" aria-label="Close popup"
            class="active:scale-95 p-2 rounded-md bg-slate-200 text-slate-600 hover:text-slate-800">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" class="h-5 w-5">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M18 6l-12 12" />
              <path d="M6 6l12 12" />
            </svg>
          </button>
        </div>
        <img src="https://karimunkab.go.id/logo/poster-hut80-popup.png" class="w-full h-auto" alt="">
        {{-- <div class="py-2 mx-auto w-full flex justify-center border-t border-slate-400">
          <button class="mx-auto bg-orange-600 text-white px-2 py-1 rounded-lg">
            <span class="text-sm font-medium">TUTUP</span>
          </button>
        </div> --}}
      </div>
    </div>
  @endpush
@endif
