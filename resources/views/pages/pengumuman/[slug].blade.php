@php
  $announce = \App\Models\Announcement::where('slug', $slug)->firstOrFail();
@endphp

@extends('layouts.app', ['activePage' => 'berita'])

@section('content')
  <div class=" w-full bg-white">

    <div class="max-w-screen-md mx-auto w-full space-y-6 py-16 px-2">
      {{-- Breadcrumbs --}}
      <ul class="text-center flex gap-2 justify-center">
        <li class="text-xl font-medium text-slate-600"><a href="/pengumuman" class="hover:underline">
            Pengumuman</a></li>
        <li class="text-xl font-medium text-slate-600">/</li>
        <li class="text-xl font-medium text-orange-600">{{ $announce->author->name }}</li>
      </ul>
      {{-- Breadcrumbs --}}

      <div class="grid gap-4 place-content-center">
        <h1 class="text-center text-2xl md:text-5xl leading-6 md:leading-16 font-medium text-slate-700">
          {{ $announce->title }}
        </h1>

        <div class="flex items-center justify-center gap-2 text-slate-600 h-fit text-lg">
          <p>{{ $announce->published_at->isoFormat('d MMMM Y') }}</p>
          <x-icons.dot class="w-2 h-2" />
          <p>{{ $announce->author->name }}</p>
        </div>
      </div>

      @if ($announce->thumbnail)
        <div class="grid gap-4">
          <img class="w-full h-auto max-h-80 object-cover ring-1 ring-zinc-300" src="{{ asset($announce->thumbnail) }}"
            alt="{{ $announce->title }}">
        </div>
      @endif


      {{-- html tags --}}
      <div class="text-xl leading-8 space-y-2 text-slate-700 html-content">
        {!! $announce->content !!}
      </div>
      {{-- html tags --}}

      <div class="space-y-2">
        <p>File Pendukung:</p>
        <div class="flex flex-grow gap-2">
          @php $index = 1; @endphp
          @foreach ($announce->files ?? [] as $file)
            <a href="{{ asset('storage/' . $file) }}" download
              class="inline-flex items-center gap-2 text-slate-700 hover:text-orange-600 px-3 py-2 bg-slate-200 rounded-lg">

              <span>Download File {{ $index++ }}</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="h-5 w-5">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                <path d="M7 11l5 5l5 -5" />
                <path d="M12 4l0 12" />
              </svg>
            </a>
          @endforeach
        </div>
      </div>


      <hr class="border-t border-slate-400">

      {{-- Share --}}
      {{-- <div class="space-y-2 ">
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
      </div> --}}

    </div>

  </div>
@endsection
