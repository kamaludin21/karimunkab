@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <section class="max-w-screen-lg mx-auto w-full">
    {{-- Header --}}
     <div class="pt-10">
      <p class="text-4xl font-medium text-slate-800">Arsip Dokumen</p>
    </div>

    <div class="flex gap-2 py-16">
      <div class="w-1/3 p-4 h-min border rounded-lg border-slate-200 space-y-2">
        <p class="text-lg font-medium text-slate-600">Organisasi/Lembaga</p>
        <hr class="border-t border-slate-200">
        <ul class="space-y-2 text-slate-500">
          <li class="bg-orange-600 text-white p-2 rounded-md">Semua</li>
          <li class="hover:bg-slate-200 hover:px-2 py-2 duration-200 rounded-md">BPKSDM</li>
          <li class="hover:bg-slate-200 hover:px-2 py-2 duration-200 rounded-md">BPKAD</li>
          <li class="hover:bg-slate-200 hover:px-2 py-2 duration-200 rounded-md">Bagian Keuangan</li>
        </ul>
      </div>
      <div class="w-2/3 p-4 border rounded-lg border-slate-200 space-y-4">
        <p class="text-2xl font-medium text-slate-600">Semua</p>
        {{-- <p class="text-sm">1020 Dokumen ditemukan</p> --}}

        {{-- Data List --}}
        <div class="pt-4 border-t border-slate-300 space-y-4">
          @for ($i = 0; $i < 5; $i++)
            <div class="p-2 flex items-start border border-slate-300 hover:border-slate-400 gap-2 rounded-lg h-min group duration-200">
              <div class="bg-slate-100 rounded p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                  class="h-12 w-auto flex-none text-slate-500 group-hover:text-slate-600">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                  <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                  <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6" />
                  <path d="M17 18h2" />
                  <path d="M20 15h-3v6" />
                  <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z" />
                </svg>
              </div>
              <div class="space-y-1">
                <p class="text-xl font-medium text-slate-700 group-hover:text-slate-800  line-clamp-2">Rencana Kerja Pemerintah Daerah (RKPD) Jabar Tahun 2025</p>
                <div class="flex gap-2 text-slate-600 items-center justify-between">
                  <div class="flex items-center gap-2">
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
                      <p>12 Januari 2024</p>
                    </div>
                    <x-icons.dot class="h-1 w-1 text-slate-400" />
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
                      <p>BKPSDM</p>
                    </div>
                  </div>
                  <button
                    class="bg-white border border-slate-400 text-slate-700 hover:bg-slate-800 hover:text-white cursor-pointer rounded px-2 py-1 flex gap-1 active:scale-95">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                      stroke-linejoin="round" class="h-auto w-5 stroke-[1.5]">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                      <path d="M7 11l5 5l5 -5" />
                      <path d="M12 4l0 12" />
                    </svg>
                    <span class="text-sm">Unduh</span>
                  </button>
                </div>
              </div>
            </div>
          @endfor
        </div>

        {{-- Pagination --}}
        <div class="flex border-t border-slate-200 pt-6 justify-between items-center">
          <ul class="flex items-center gap-4 text-lg font-medium">
            <li class="bg-orange-600 rounded py-0.5 px-2 text-white cursor-pointer" disabled>
              1</li>
            <li
              class="bg-white rounded py-0.5 px-2 ring-1 ring-zinc-200 text-slate-600 cursor-pointer hover:bg-slate-200">
              2</li>
            <li
              class="bg-white rounded py-0.5 px-2 ring-1 ring-zinc-200 text-slate-600 cursor-pointer hover:bg-slate-200">
              3</li>
            <li
              class="bg-white rounded py-0.5 px-2 ring-1 ring-zinc-200 text-slate-600 cursor-pointer hover:bg-slate-200">
              ...</li>
            <li
              class="bg-white rounded py-0.5 px-2 ring-1 ring-zinc-200 text-slate-600 cursor-pointer hover:bg-slate-200">
              15</li>
          </ul>
          <div>
            <button
              class="bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300 text-slate-500 hover:text-slate-600">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 stroke-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
              </svg>
            </button>
            <button
              class="bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300 text-slate-500 hover:text-slate-600">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 stroke-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 6l6 6l-6 6" />
              </svg>
            </button>
          </div>
        </div>
        {{-- Pagination --}}



      </div>
    </div>
  </section>
@endsection
