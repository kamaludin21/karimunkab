<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <title>Kabupaten Karimun</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
</head>

<body class="grid bg-slate-100">
  <nav x-data="{ mobileOpen: false }" class="bg-white sticky top-0 z-50 shadow">
    <div class="max-w-screen-lg px-2 flex items-center justify-between mx-auto w-full py-4">
      <div class="flex gap-6">
        <img src="{{ asset('assets/images/logo_kab.png') }}" class="w-auto h-12 hover:scale-110 duration-200"
          alt="logo_kab">
        <img src="{{ asset('assets/images/logo_hut.png') }}" class="w-auto h-12 hover:scale-110 duration-200"
          alt="logo_hut">
        <img src="{{ asset('assets/images/hutri_80.png') }}" class="w-auto h-12 hover:scale-110 duration-200"
          alt="logo_hut">
      </div>
      {{-- Nav Menu Mobile --}}
      <div class="block md:hidden">
        <button @click="mobileOpen = !mobileOpen"
          class="bg-white hover:bg-slate-800 p-2 active:scale-95 rounded-lg border border-slate-300 group duration-200">
          <svg x-show="!mobileOpen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="text-slate-600 group-hover:text-white h-6 w-6">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 6l16 0" />
            <path d="M4 12l16 0" />
            <path d="M4 18l16 0" />
          </svg>
          {{-- Switch this icon when reverse status --}}
          <svg x-show="mobileOpen" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="text-slate-600 group-hover:text-white h-6 w-6">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M18 6l-12 12" />
            <path d="M6 6l12 12" />
          </svg>
        </button>
      </div>
      {{-- Hidden on mobile --}}
      <div class="bg-white w-1/3 h-10 border border-slate-400 rounded-lg hidden md:flex p-1">
        <input type="text" class="flex-1 focus:outline-none pl-2" placeholder="Pencarian">
        <button class="bg-white hover:bg-amber-300 rounded-r-md px-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-orange-600 h-6 w-auto" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
            <path d="M21 21l-6 -6" />
          </svg>
        </button>
      </div>
    </div>
    {{-- Menu navigator --}}
    <div class="hidden md:block max-w-screen-lg px-2 mx-auto w-full border-t-1 border-slate-200">
      <ul class="text-sm font-medium uppercase flex gap-4 text-slate-600">
        <li class="h-full">
          <a href="/"
            class="{{ ($activePage ?? '') === 'beranda' ? 'text-orange-600' : 'hover:text-slate-800  border-transparent' }} flex gap-1 items-center border-b-2 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M9 3a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2zm0 12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2zm10 -4a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2zm0 -8a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2z" />
            </svg>
            <span>Beranda</span>
          </a>
        </li>
        <li class="">
          <a href="/berita"
            class="{{ ($activePage ?? '') === 'berita' ? 'text-orange-600 border-b-2' : 'hover:text-slate-800 border-transparent border-b-2' }} h-full block hover:border-b-2 p-2 uppercase">
            berita
          </a>
        </li>
        <li class="group relative">
          <a href="javacript:void(0)"
            class="{{ ($activePage ?? '') === 'informasi-publik' ? 'text-orange-600 border-b-2' : 'hover:text-slate-800 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 flex items-center gap-1">
            <span>Informasi Publik</span>
            <x-icons.chevron-down class="h-5 w-5 stroke-2 group-hover:rotate-180 duration-300" />
          </a>
          <div
            class="hidden group-hover:block bg-white p-1 min-w-40 w-full h-auto rounded absolute top-full ring-1 ring-slate-300 grid">
            <div class="hover:bg-slate-100 p-2 rounded">
              <a href="/pengumuman" class="">
                Pengumuman
              </a>
            </div>
            <div class="hover:bg-slate-100 p-2 rounded">
              <a href="/arsip-dokumen" class="">
                Nomor Penting
              </a>
            </div>
            <div class="hover:bg-slate-100 p-2 rounded">
              <a href="/arsip-dokumen" class="">
                Arsip Dokumen
              </a>
            </div>
          </div>
        </li>
        <li>
          <a href="/tautan-aplikasi"
            class="{{ ($activePage ?? '') === 'tautan-aplikasi' ? 'text-orange-600 border-b-2' : 'hover:text-slate-800 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 uppercase">
            Tautan Aplikasi
          </a>
        </li>
        <li class="group relative">
          <a href="javacript:void(0)"
            class="{{ ($activePage ?? '') === 'ppid' ? 'text-orange-600 border-b-2' : 'hover:text-slate-800 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 flex items-center gap-1">
            <span>PPID</span>
            <x-icons.chevron-down class="h-5 w-5 stroke-2 group-hover:rotate-180 duration-300" />
          </a>
          <div
            class="hidden group-hover:block bg-white p-1 min-w-40 w-max h-auto rounded absolute top-full ring-1 ring-slate-300 grid">
            <div class="hover:bg-slate-100 p-2 rounded">
              <a href="/arsip-dokumen" class="flex gap-2">
                <span>Permohonan Informasi Publik</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                  stroke-linejoin="round" class="h-5 w-5 stroke-[1.7] ">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                  <path d="M11 13l9 -9" />
                  <path d="M15 4h5v5" />
                </svg>
              </a>
            </div>
            <div class="hover:bg-slate-100 p-2 rounded">
              <a href="/arsip-dokumen" class="">
                Informasi Publik Berkala
              </a>
            </div>

          </div>
        </li>
      </ul>
    </div>
    {{-- Mobile Menu --}}
    <div id="mobile-menu" x-cloak x-show="mobileOpen" x-transition @click.away="mobileOpen = false"
      class="block md:hidden shadow-lg bg-white p-2 absolute w-full rounded-b-lg border-t-1 border-slate-200 text-slate-600 grid divide-y divide-slate-400">

      {{-- Mobile Menu List --}}
      <a href="/" class="w-full text-lg font-base flex justify-between hover:bg-slate-100 p-2 group">
        <span class="group-hover:text-slate-800">Beranda</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="h-8 w-8 rotate-45 group-hover:rotate-90 duration-200 text-slate-400 group-hover:text-slate-800">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M12 5l0 14" />
          <path d="M18 11l-6 -6" />
          <path d="M6 11l6 -6" />
        </svg>
      </a>
      <a href="/berita" class="w-full text-lg font-base flex justify-between hover:bg-slate-100 p-2 group">
        <span class="group-hover:text-slate-800">Berita</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="h-8 w-8 rotate-45 group-hover:rotate-90 duration-200 text-slate-400 group-hover:text-slate-800">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M12 5l0 14" />
          <path d="M18 11l-6 -6" />
          <path d="M6 11l6 -6" />
        </svg>
      </a>
      <a href="" class="w-full text-lg font-base flex justify-between hover:bg-slate-100 p-2 group">
        <span class="group-hover:text-slate-800">Informasi Publik </span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" class="h-8 w-8 duration-200 text-slate-400 group-hover:text-slate-800">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M6 9l6 6l6 -6" />
        </svg>
      </a>
      <a href="/tautan-aplikasi" class="w-full text-lg font-base flex justify-between hover:bg-slate-100 p-2 group">
        <span class="group-hover:text-slate-800">Tautan Aplikasi</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
          class="h-8 w-8 rotate-45 group-hover:rotate-90 duration-200 text-slate-400 group-hover:text-slate-800">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M12 5l0 14" />
          <path d="M18 11l-6 -6" />
          <path d="M6 11l6 -6" />
        </svg>
      </a>
      <a href="" class="w-full text-lg font-base flex justify-between hover:bg-slate-100 p-2">
        <span class="group-hover:text-slate-800">PPID</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
          stroke-linejoin="round" class="h-8 w-8 duration-200 text-slate-400 group-hover:text-slate-700">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M6 9l6 6l6 -6" />
        </svg>
      </a>
      {{-- Mobile Menu List --}}

      {{-- Searchbox --}}
      <div class="bg-white w-full h-10 border border-slate-400 rounded-lg flex p-1 mt-4">
        <input type="text" class="flex-1 focus:outline-none pl-2" placeholder="Pencarian">
        <button class="bg-white hover:bg-amber-300 rounded-r-md px-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="text-orange-600 h-6 w-auto" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
            <path d="M21 21l-6 -6" />
          </svg>
        </button>
      </div>
      {{-- Menu --}}
    </div>
  </nav>
  <main class="bg-white">
    @yield('content')
  </main>
  <footer class="w-full bg-slate-900 pt-10 pb-20">
    <div class="max-w-screen-lg px-2 mx-auto text-slate-300">
      <div class="overflow-hidden">
        <div class="flex py-8 relative border-b border-slate-700">
          <div class="flex-1 space-y-2 z-10">
            <img src="{{ asset('assets/images/logo_kab.png') }}" class="w-32 h-auto" alt="">
          </div>
          <div class="absolute right-0 z-0 bottom-0">
            <p
              class="text-9xl tracking-wide font-bold text-right bg-gradient-to-t bg-slate-900 via-slate-800 to-slate-800 bg-clip-text text-transparent">
              BUMI
            </p>
          </div>
        </div>
        <div class="flex py-8 items-end relative">
          <div class="flex-1 z-10">
            <p class="text-slate-200 text-base font-normal">KABUPATEN KARIMUN</p>
            <p class="text-sm font-light">DISKOMINFO</p>
          </div>
          <p
            class="absolute top-4 right-0 bottom-0 leading-[0.8] text-9xl tracking-wide font-bold text-right bg-gradient-to-b bg-slate-900 via-slate-800 to-slate-800 bg-clip-text text-transparent">
            <span class="align-[0px]">BERAZAM</span>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div class="w-full bg-slate-800 py-1">
    <p class="text-sm text-center font-medium text-slate-100">Copyright &copy; 2025 </p>
  </div>
</body>
