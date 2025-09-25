@php
  use App\Models\News;
  $news = News::where('slug', $slug)->firstOrFail();
  $otherNews = News::whereNot('id', $news->id)->orderBy('published_at', 'desc')->limit(5)->get();
@endphp

@extends('layouts.app', ['activePage' => 'berita'])

@section('ogcard')
  <x-partials.og-card :url="url('/berita/baca/' . $news->slug)" :title="$news->title" :description="Str::limit(strip_tags($news->content), 160)" :image="$news->image_url ? asset($news->image_url) : asset('assets/images/main_og_card.webp')" />
@endsection

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
        <a href="/berita/{{ $news->category->slug }}"
          class="flex gap-1 items-center hover:underline cursor-pointer whitespace-nowrap">
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
          <div class="gap-1 hover:bg-slate-800 hover:text-white cursor-pointer p-1 rounded select-none">
            <button onclick="openModal('shareModal')" class="flex items-center gap-1">
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
          </div>
          <x-commons.modal id="shareModal" title="Contoh Modal" :show="false">
            <div class="space-y-2  p-6">
              <p class="text-base font-medium text-slate-500">Bagikan:</p>
              <p class="text-lg font-semibold text-slate-600">{{ $news->title }}</p>
              <div class="flex gap-4 justify-center">
                <button type="button" onclick="share.facebook(location.href)"
                  class="p-1.5 rounded-md bg-blue-500 active:scale-95">
                  <x-icons.facebook class="w-7 h-auto text-white" />
                </button>
                <button type="button" onclick="share.x(location.href)"
                  class="p-1.5 rounded-md bg-sky-500 active:scale-95">
                  <x-icons.twitter class="w-7 h-auto text-white" />
                </button>
              </div>

            </div>
          </x-commons.modal>
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

      <div
        class="text-lg leading-7 space-y-2 text-slate-700 html-content select-none px-2 lg:px-0 pb-6 border-b border-slate-300">
        {!! $news->content !!}
      </div>

      @if ($news->tags->isNotEmpty())
        <div class="px-2 lg:px-0">
          <p class="text-slate-700 font-medium">Topik:</p>
          <div class="flex flex-grow gap-2 text-sm text-slate-600">
            @foreach ($news->tags as $tag)
              <p class="p-1 hover:bg-slate-200 cursor-pointer hover:underline underline-offset-2 capitalize">
                <span class="font-medium">#</span>{{ strtolower($tag->name) }}
              </p>
            @endforeach
          </div>
        </div>
      @endif
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
@endsection
