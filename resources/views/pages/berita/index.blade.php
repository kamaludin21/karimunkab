@extends('layouts.app', ['activePage' => 'berita'])

@section('content')
  <div class="max-w-screen-lg mx-auto w-full">
    {{-- Hero Section --}}
    <section class="flex gap-8 items-center py-16">
      <div class="flex-1 w-1/2">
        <img
          src="https://medusajs.com/_next/image/?url=https%3A%2F%2Fcdn.sanity.io%2Fimages%2F5a711ubd%2Fproduction%2F57c48878a2a1d44d37a44bc145200c9402af4fe1-3200x1672.jpg%3Fw%3D1280%26fm%3Dpng&w=3840&q=75"
          class="w-full h-auto bg-cover rounded-lg ring-1 ring-zinc-300 shadow-md hover:shadow-lg" alt="">
      </div>
      <div class="flex-1 grid gap-4 place-content-center justify-start">
        <div class="flex items-center gap-2 text-slate-600 h-fit">
          <p>21 Mei 2025</p>
          <x-icons.dot class="w-2 h-2" />
          <p>Pemerintahan</p>
        </div>
        <h1 class="font-medium text-5xl leading-[1.1] text-slate-600 line-clamp-3">
          <a href="/berita/slug" class="hover:underline underline-1">Fastest Way to Build and Deploy Medusa Applications</a>

          <!-- Inline action button -->
          <a href="/berita/slug"
            class="inline-flex items-center justify-center align-middle
             group rounded-lg
            hover:bg-orange-600 transition duration-200 ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="h-10 w-10 text-slate-600 group-hover:text-slate-100 group-hover:-rotate-45 transition duration-200">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 12l14 0" />
              <path d="M13 18l6 -6" />
              <path d="M13 6l6 6" />
            </svg>

          </a>
        </h1>
      </div>
    </section>
    {{-- Hero Section --}}

    <hr class="border-t-1 border-slate-200">

    <section class="w-full slate-100  py-16">
      <div class="max-w-screen-lg grid gap-8 mx-auto w-full">
        {{-- Header Filter --}}
        <div class="flex justify-between items-center">
          <div class="flex gap-4 items-center text-slate-500 font-medium">
            <div
              class="py-1.5 px-3 bg-white border border-slate-200 rounded-full text-orange-600 flex items-center gap-1 hover:bg-slate-200">
              <span>Semua Berita</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 9l6 6l6 -6" />
              </svg>
            </div>
          </div>
          <div class="bg-white w-1/3 h-10 border border-slate-400 rounded-lg flex p-1">
            <input type="text" class="flex-1 focus:outline-none pl-2" placeholder="Pencarian">
            <button class="bg-white hover:bg-amber-300 rounded-r-md px-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-600 h-6 w-auto" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
              </svg>
            </button>
          </div>
        </div>
        {{-- Header Filter --}}


        <div class="grid grid-cols-3 gap-14">
          @for ($i = 0; $i < 9; $i++)
            <div class="hover:slate-200 rounded-lg duration-200 grid group">
              <img
                src="https://medusajs.com/_next/image/?url=https%3A%2F%2Fcdn.sanity.io%2Fimages%2F5a711ubd%2Fproduction%2F8cc4fc064087bb7539d41e7847b3fe8fd893a5e4-3200x1672.jpg%3Fw%3D600&w=3840&q=75"
                class="w-full h-auto min-h-32 duration-200 object-cover group-hover:object-fill rounded-lg ring-1 ring-zinc-300 shadow-md hover:shadow-lg"
                alt="">
              <div class="text-sm flex items-center gap-2 pt-3 pb-1 text-slate-600 h-fit">
                <p>21 Mei 2025</p>
                <x-icons.dot class="w-1 h-1" />
                <p>Pemerintahan</p>
              </div>
              <a href="/berita/slug"
                class="text-lg font-medium text-slate-600 hover:underline underline-offset-2 cursor-pointer hover:text-orange-600">
                Lorem ipsum dolor sit amet
                consectetur adipisicing elit.</a>
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
            <button class="bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300 text-slate-500 hover:text-slate-600">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 stroke-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
              </svg>
            </button>
            <button class="bg-white hover:bg-slate-200 rounded p-1 ring-1 ring-zinc-300 text-slate-500 hover:text-slate-600">
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
    </section>

  </div>
@endsection
