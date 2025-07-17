@extends('layouts.app', ['activePage' => 'tautan-aplikasi'])

@section('content')
  <section class="max-w-screen-lg mx-auto w-full">
    {{-- Header --}}
    <div class="pt-10">
      <p class="text-4xl font-medium text-slate-800">Tautan Aplikasi</p>
    </div>

    <div class="flex gap-2 py-16">
      <div class="w-1/3 p-4 h-min border rounded-lg border-slate-200 space-y-2">
        <p class="text-lg font-medium text-slate-600">Kategori Tautan</p>
        <hr class="border-t border-slate-200">
        <ul class="space-y-2 text-slate-500">
          <li class="bg-orange-600 text-white p-2 rounded-md">Semua</li>
          <li class="hover:bg-slate-200 hover:px-2 py-2 duration-200 rounded-md">Situs Desa</li>
          <li class="hover:bg-slate-200 hover:px-2 py-2 duration-200 rounded-md">Situs OPD</li>
          <li class="hover:bg-slate-200 hover:px-2 py-2 duration-200 rounded-md">Aplikasi Nasional</li>
        </ul>
      </div>
      <div class="w-2/3 p-4 border rounded-lg border-slate-200 space-y-4">
        <p class="text-2xl font-medium text-slate-600">Semua</p>
        <div class="bg-white border border-slate-200 rounded-lg  flex p-4 items-center justify-between">
          <div>
            <p class="text-lg text-slate-800 font-medium">Desa Kundur</p>
            <a href="" class="text-slate-600">https://kundur.desa.id</a>
          </div>
          <div class="flex gap-1 items-center">
            <button class="hover:bg-slate-200 bg-white p-2 rounded active:scale-95">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                class="h-5 w-5 stroke-2 text-slate-600">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                <path d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
              </svg>
            </button>
            <button class="hover:bg-slate-200 bg-white p-2 rounded active:scale-95">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                class="h-5 w-5 stroke-2 text-slate-600">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                <path d="M7 17l0 .01" />
                <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                <path d="M7 7l0 .01" />
                <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                <path d="M17 7l0 .01" />
                <path d="M14 14l3 0" />
                <path d="M20 14l0 .01" />
                <path d="M14 14l0 3" />
                <path d="M14 20l3 0" />
                <path d="M17 17l3 0" />
                <path d="M20 17l0 3" />
              </svg>
            </button>
            <button class="hover:bg-slate-200 bg-white p-2 rounded active:scale-95">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                class="h-5 w-5 stroke-2 text-slate-600">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                <path d="M11 13l9 -9" />
                <path d="M15 4h5v5" />
              </svg>
            </button>
          </div>
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
