@php
  $organisasiList = \App\Models\Announcement::with('author')->get()->pluck('author.name')->unique()->filter()->values();
  $announcements = \App\Models\Announcement::with('author')
      ->orderBy('published_at', 'desc')
      ->paginate(5)
      ->withQueryString();
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <section class="max-w-screen-lg px-2 mx-auto w-full">
    {{-- Header --}}
    <div class="pt-10">
      <p class="text-4xl font-medium text-slate-800">Pengumuman</p>
    </div>

    <div class="flex flex-col md:flex-row gap-2 py-16">
      <div class="w-full md:w-1/3 p-4 h-min border rounded-lg border-slate-200 space-y-2">
        <p class="text-lg font-medium text-slate-600">Organisasi/Lembaga</p>
        <hr class="border-t border-slate-200">
        <ul class="space-y-2 text-slate-500">
          <li>
            <a href="javascript:void(0)" class="block hover:px-2 duration-200 py-2 rounded-md hover:bg-slate-200">
              Semua
            </a>
          </li>
          @foreach ($organisasiList as $org)
            <li>
              {{-- /pengumuman/organisasi/nama-organisasi --}}
              <a href="javascript:void(0)" class="block hover:px-2 duration-200 py-2 rounded-md hover:bg-slate-200">
                {{ $org }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="w-full md:w-2/3 p-4 border rounded-lg border-slate-200">
        <p class="text-2xl font-medium text-slate-600">Semua</p>

        {{-- Data List --}}
        <div class="grid divide-y divide-slate-300 gap-4 border-t border-slate-300">
          @forelse ($announcements as $item)
            <div class="group duration-200  py-4 w-full">
              <div class="space-y-2">
                <a href="/pengumuman/{{ $item->slug }}"
                  class="hover:underline text-xl font-medium text-slate-700 group-hover:text-slate-800 line-clamp-2">
                  {{ $item->title }}
                </a>
                <div class="flex flex-col md:flex-row md:items-center gap-2 text-slate-600">
                  {{-- Tanggal --}}
                  <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 stroke-[1.5]">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                      <path d="M16 3l0 4" />
                      <path d="M8 3l0 4" />
                      <path d="M4 11l16 0" />
                      <path d="M8 15h2v2h-2z" />
                    </svg>
                    <p>{{ $item->published_at->isoFormat('d MMMM Y') }}</p>
                  </div>
                  <x-icons.dot class="hidden md:block h-1 w-1 text-slate-400" />
                  {{-- Organisasi --}}
                  <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 stroke-[1.5]">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" />
                      <path d="M16 8h2c1 0 2 1 2 2v11" />
                      <path d="M3 21h18" />
                      <path d="M10 12v0" />
                      <path d="M10 16v0" />
                      <path d="M10 8v0" />
                      <path d="M7 12v0" />
                      <path d="M7 16v0" />
                      <path d="M7 8v0" />
                      <path d="M17 12v0" />
                      <path d="M17 16v0" />
                    </svg>
                    <p>{{ $item->author->name ?? '-' }}</p>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <p class="py-4 text-slate-500">Tidak ada pengumuman.</p>
          @endforelse
        </div>

      </div>
    </div>
  </section>
@endsection
