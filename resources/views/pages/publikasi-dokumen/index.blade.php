@php
  $organisasiList = \App\Models\Document::with('author')->get()->pluck('author.name')->unique()->filter()->values();
  $documents = \App\Models\Document::with('author')->latest()->paginate(10);
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <section class="max-w-screen-lg px-2 mx-auto w-full">
    <div class="pt-10">
      <p class="text-4xl font-medium text-slate-800">Publikasi Dokumen</p>
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
              {{-- /publikasi-dokumen/organisasi/nama-organisasi --}}
              <a href="javascript:void(0)" class="block hover:px-2 duration-200 py-2 rounded-md hover:bg-slate-200">
                {{ $org }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="w-full md:w-2/3 p-4 border rounded-lg border-slate-200 space-y-4">
        <p class="text-2xl font-medium text-slate-600">Semua</p>

        {{-- Data List --}}
        <div class="pt-4 border-t border-slate-300 space-y-4">
          @forelse ($documents as $doc)
            <div
              class="p-2 flex items-start h-full border border-slate-200 hover:border-slate-300 gap-2 rounded-lg h-min group duration-200">

              <div class="space-y-2 flex flex-col justify-between h-full w-full">
                <a href="/publikasi-dokumen/{{ $doc->slug }}" class="hover:underline text-lg font-semibold text-slate-600 line-clamp-2">
                  {{ $doc->title }}
                </a>
                <div x-data="{ open: false }"  class="flex gap-2 text-slate-600 items-center justify-between">
                  <div class="flex flex-col md:flex-row md:items-center gap-2">
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
                      <p>
                        {{ $doc->published_at->isoFormat('D MMMM Y') }}</p>
                    </div>
                    <x-icons.dot class="hidden md:block h-1 w-1 text-slate-400" />
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
                      <p>{{ $doc->author->name ?? 'Tidak diketahui' }}</p>
                    </div>
                  </div>

                  {{-- <a href="/publikasi-dokumen/{{ $doc->slug }}"
                    class="text-center hover:bg-slate-100 rounded-sm px-1.5 ring ring-slate-200 cursor-pointer hover:scale-105 hover:text-orange-600 duration-200 mx-auto">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                      class="w-8 h-fit mx-auto">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>
                  </a> --}}
                  {{-- <a href="{{ asset('storage/' . $doc->file) }}" download
                    class="bg-white border border-slate-400 text-slate-700 hover:bg-slate-800 hover:text-white cursor-pointer rounded px-2 py-1 flex gap-1 active:scale-95">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                      stroke-linejoin="round" class="h-auto w-5 stroke-[1.5]">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                      <path d="M7 11l5 5l5 -5" />
                      <path d="M12 4l0 12" />
                    </svg>
                    <span class="text-sm">Unduh</span>
                  </a> --}}
                </div>
              </div>
            </div>
          @empty
            <p class="text-slate-500">Tidak ada dokumen ditemukan.</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>
@endsection
