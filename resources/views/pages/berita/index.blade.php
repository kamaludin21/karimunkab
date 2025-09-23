@php
  $news = App\Models\News::orderBy('published_at', 'desc')->paginate(9);
  $category = App\Models\NewsCategory::limit(6)->get();
@endphp

@extends('layouts.app', ['activePage' => 'berita'])

@section('content')
  <div class="max-w-screen-lg mx-auto w-full mb-16">
    <div class="px-2 md:px-6 rounded-none md:rounded-lg my-0 md:my-6 py-4 md:py-8 dot-pattern">
      <p class="text-3xl md:text-5xl font-semibold text-slate-100 font-header">Berita Karimun</p>
    </div>
    <section class=" space-y-4 py-4 md:py-2 px-2 lg:px-0 overflow-hidden">
      <x-commons.category-tabs :categories="$category" />
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($news as $item)
          <div class="rounded-lg group space-y-2">
            <img src="{{ asset($item->image_url) }}"
              class="w-full min-h-32 h-44 duration-200 object-cover rounded-lg ring-1 ring-zinc-300 shadow-md hover:shadow-lg"
              alt="{{ $item->title }}">
            <div class="space-y-0">
              <p class="text-slate-600 text-sm">{{ $item->published_at->isoFormat('D MMMM Y') }}</p>
              <a href="/berita/baca/{{ $item->slug }}"
                class="text-lg font-medium text-slate-600 hover:underline underline-offset-2 cursor-pointer hover:text-orange-600 line-clamp-3">
                {{ $item->title }}
              </a>
            </div>
          </div>
        @empty
          <p class="col-span-full py-10 text-center text-slate-500">Belum ada berita</p>
        @endforelse
      </div>
      @if ($news->hasPages())
        <div class="flex border-t border-slate-200 pt-6 justify-between items-center">
          <ul class="flex items-center gap-4 text-lg font-medium">
            @php
              $start = max(1, $news->currentPage() - 2);
              $end = min($news->lastPage(), $news->currentPage() + 2);
            @endphp

            @if ($start > 1)
              <li>
                <a href="{{ $news->url(1) }}"
                  class="bg-white rounded py-1 px-2 ring-1 ring-zinc-200 text-slate-600 hover:bg-slate-200">1</a>
              </li>
              @if ($start > 2)
                <li class="text-slate-400">...</li>
              @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
              @if ($i == $news->currentPage())
                <li>
                  <a href="javascript:void(0)" class="bg-orange-600 rounded py-1 px-2 ring-1 ring-zinc-200 text-white">
                    {{ $i }}
                  </a>
                </li>
              @else
                <li>
                  <a href="{{ $news->url($i) }}"
                    class="bg-white rounded py-1 px-2 ring-1 ring-zinc-200 text-slate-600 hover:bg-slate-200">
                    {{ $i }}
                  </a>
                </li>
              @endif
            @endfor

            @if ($end < $news->lastPage())
              @if ($end < $news->lastPage() - 1)
                <li class="text-slate-400">...</li>
              @endif
              <li>
                <a href="{{ $news->url($news->lastPage()) }}"
                  class="bg-white rounded py-1 px-2 ring-1 ring-zinc-200 text-slate-600 hover:bg-slate-200">
                  {{ $news->lastPage() }}
                </a>
              </li>
            @endif
          </ul>
          <div class="flex gap-2">
            <a href="{{ $news->previousPageUrl() }}"
              class="{{ $news->onFirstPage() ? 'pointer-events-none text-slate-300' : 'hover:text-slate-600 text-slate-500' }} bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 6l-6 6l6 6" />
              </svg>
            </a>
            <a href="{{ $news->nextPageUrl() }}"
              class="{{ $news->hasMorePages() ? 'hover:text-slate-600 text-slate-500' : 'pointer-events-none text-slate-300' }} bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 6l6 6l-6 6" />
              </svg>
            </a>
          </div>
        </div>
      @endif
    </section>
  </div>
@endsection
