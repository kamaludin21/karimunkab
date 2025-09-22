@php
  use App\Models\News;
  $news = News::where('slug', $slug)->firstOrFail();
  $otherNews = News::whereNot('id', $news->id)->orderBy('published_at', 'desc')->limit(5)->get();
@endphp

@extends('layouts.app', ['activePage' => 'berita'])

@section('content')
  <div class="max-w-screen-lg mx-auto w-full bg-white py-6 md:py-10 flex flex-col md:flex-row items-start gap-8">

    <div class="w-full md:w-2/3 space-y-2">
      {{-- Breadcrumbs --}}
      <div class="px-2 lg:px-0 py-2 w-full flex gap-0.5 items-center text-slate-500 overflow-hidden text-sm">
        <a href="/berita" class="flex gap-1 items-center hover:underline cursor-pointer">
          <span>Berita</span>
        </a>
        <div>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="w-4 h-4">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 6l6 6l-6 6" />
          </svg>
        </div>
        <a href="/berita/{{ $news->category->slug }}" class="flex gap-1 items-center hover:underline cursor-pointer whitespace-nowrap">
          <span>{{ $news->category->title }}</span>
        </a>
        <div>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" class="w-4 h-4">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M9 6l6 6l-6 6" />
          </svg>
        </div>
        <a href="javascript:void(0)" class="flex gap-1 items-center hover:underline cursor-pointer text-slate-700">
          <span class="line-clamp-1">{{ substr($news->title, 0, 25) }}...</span>
        </a>
      </div>
      {{-- Breadcrumbs --}}

      {{-- Header --}}
      <div class="px-2 lg:px-0 space-y-4">
        <h1 class="text-2xl md:text-3xl leading-8 md:leading-9 font-bold text-slate-600">
          {{ $news->title }}
        </h1>
        <div class="bg-slate-100 rounded-lg p-2 text-slate-500 flex items-center gap-2">
          <div class="grid flex-1">
            <div class="flex gap-1 items-center">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="h-auto w-4">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                <path
                  d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" />
              </svg>
              <p class="text-sm">{{ $news->category->title }}</p>
            </div>
            <div class="flex gap-1 items-center">
              <svg viewBox="0 0 24 24" fill="currentColor" class="h-auto w-4">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M16 2a1 1 0 0 1 .993 .883l.007 .117v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 1.993 -.117l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                <path d="M8 14h2v2h-2z" />
              </svg>
              <p class="text-sm line-clamp-1">{{ $news->published_at->isoFormat('dddd, D MMMM Y') }}</p>
            </div>
          </div>
          {{-- <div class="gap-1 hover:bg-slate-800 hover:text-white cursor-pointer p-1 rounded select-none">
            <button id="shareBtn" class="flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-share">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M8.7 10.7l6.6 -3.4" />
                <path d="M8.7 13.3l6.6 3.4" />
              </svg>
              <span class="text-sm font-light">Bagikan</span>
            </button>
          </div> --}}
        </div>
      </div>
      {{-- Header --}}

      {{-- Image Cover --}}
      <div class="space-y-2 w-full py-4">
        <img
          class="w-full h-auto min-h-56 max-h-96 object-cover duration-200 ring-1 bg-slate-200 ring-zinc-200 rounded-none md:rounded-lg "
          src="{{ asset($news->image_url) }}" alt=" {{ $news->title }}">
        {{-- <p class="text-sm text-slate-500 px-2 lg:px-0 leading-4">Bupati Karimun Hadiri Pisah Sambut Komandan Kodim
          0317 / TBK dari Letkol Inf Ida
          Bagus Putu Mudita kepada Letkol Inf Andit Franata, S.I.P</p> --}}
      </div>
      {{-- Image Cover --}}

      <div class="text-lg leading-7 space-y-2 text-slate-700 html-content select-none px-2 lg:px-0">
        {!! $news->content !!}
      </div>

      {{-- <div class="px-2 lg:px-0 py-6 border-t border-slate-200">
        <p class="text-slate-700 font-medium">Topik:</p>
        <div class="flex flex-grow gap-2 text-sm text-slate-600">
          <p class="p-1 hover:bg-slate-200 cursor-pointer hover:underline underline-offset-2">#Bupati</p>
          <p class="p-1 hover:bg-slate-200 cursor-pointer hover:underline underline-offset-2">#WakilBupati</p>
        </div>
      </div> --}}
    </div>

    <div class="w-full md:w-1/3 px-2 lg:px-0 sticky top-32">

      <div class=" space-y-4">
        <div class="flex items-center gap-2 pb-1 border-b border-slate-400">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="h-4 w-4 text-orange-600">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
              d="M13.163 2.168l8.021 5.828c.694 .504 .984 1.397 .719 2.212l-3.064 9.43a1.978 1.978 0 0 1 -1.881 1.367h-9.916a1.978 1.978 0 0 1 -1.881 -1.367l-3.064 -9.43a1.978 1.978 0 0 1 .719 -2.212l8.021 -5.828a1.978 1.978 0 0 1 2.326 0z" />
          </svg>
          <p class="text-base font-medium text-slate-600">Berita Lainnya</p>
        </div>

        <div class="grid gap-4">
          @foreach ($otherNews as $item)
            <div class="flex gap-2 items-center">
              <img class="w-2/5 rounded-lg  h-22 object-cover" src="{{ asset($item->image_url) }}"
                alt="{{ $item->title }}">
              <div class="w-3/5 flex-1">
                <p class="text-sm line-clamp-1 font-light text-slate-500">
                  {{ $news->published_at->isoFormat('dddd, D MMMM Y') }}</p>
                <a href="/berita/baca/{{ $item->slug }}"
                  class="text-base line-clamp-3 font-medium text-slate-600 hover:underline">{{ $item->title }}</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>

  <script>
    document.getElementById("shareBtn").addEventListener("click", async () => {
      if (navigator.share) {
        try {
          await navigator.share({
            title: "{{ $news->title }}",
            text: "Lihat halaman ini, menarik banget!",
            url: window.location.href
          });
          console.log("Berhasil dibagikan!");
        } catch (err) {
          console.error("Gagal membagikan:", err);
        }
      } else {
        alert("Fitur share tidak tersedia di browser ini.");
      }
    });
  </script>
@endsection

{{-- <div class="max-w-screen-md mx-auto w-full space-y-6 py-16">
      <hr class="border-t border-slate-400">
      <div class="space-y-2 ">
        <p class="text-slate-700 text-lg">Bagikan:</p>
        <div class="flex gap-4 items-center">
          <button
            class="bg-slate-200 p-1 rounded-md  text-slate-600 hover:text-slate-700  cursor-pointer border-2 border-transparent hover:border-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" class="h-6 w-auto stroke-2">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M9 15l6 -6" />
              <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
              <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
            </svg>
          </button>
          <button
            class="bg-slate-200 p-1 rounded-md  text-slate-600 hover:text-slate-700  cursor-pointer hover:ring-2 ring-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
              stroke="currentColor"stroke-linecap="round" stroke-linejoin="round" class="h-6 w-auto stroke-2">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
            </svg>
          </button>
          <button
            class="bg-slate-200 p-1 rounded-md  text-slate-600 hover:text-slate-700  cursor-pointer hover:ring-2 ring-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" class="h-6 w-auto stroke-2">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
              <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
            </svg>
          </button>
        </div>
      </div>
    </div> --}}
