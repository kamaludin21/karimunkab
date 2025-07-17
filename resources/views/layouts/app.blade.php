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
  <nav class="bg-white sticky top-0 z-50 shadow">
    <div class=" max-w-screen-lg px-2 lg:px-0 flex justify-between mx-auto w-full py-4">
      <div class="flex gap-6">
        <img src="{{ asset('assets/images/logo_kab.png') }}" class="w-12 h-auto hover:scale-110 duration-200"
          alt="logo_kab">
        <img src="{{ asset('assets/images/logo_hut.png') }}" class="w-12 h-auto hover:scale-110 duration-200"
          alt="logo_hut">
      </div>
      <div class="bg-white w-1/3 h-10 border border-slate-400 rounded-lg flex p-1">
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
    <div class="max-w-screen-lg px-2 lg:px-0 mx-auto w-full border-t-1 border-slate-200">
      <ul class="text-sm font-medium uppercase flex gap-4 text-slate-500">
        <li class="h-full">
          <a href="/"
            class="{{ ($activePage ?? '') === 'beranda' ? 'text-orange-600' : 'hover:text-slate-700  border-transparent' }} flex gap-1 items-center border-b-2 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M9 3a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2zm0 12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2zm10 -4a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2zm0 -8a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2z" />
            </svg>
            <span>Beranda</span>
          </a>
        </li>
        <li>
          <a href="/berita"
            class="{{ ($activePage ?? '') === 'berita' ? 'text-orange-600 border-b-2' : 'hover:text-slate-700 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 uppercase">
            berita
          </a>
        </li>
        <li class="group relative">
          <a href="javacript:void(0)"
            class="{{ ($activePage ?? '') === 'informasi-publik' ? 'text-orange-600 border-b-2' : 'hover:text-slate-700 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 flex items-center gap-1">
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
                Arsip Dokumen
              </a>
            </div>
          </div>
        </li>
        <li>
          <a href="/tautan-aplikasi"
            class="{{ ($activePage ?? '') === 'tautan-aplikasi' ? 'text-orange-600 border-b-2' : 'hover:text-slate-700 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 uppercase">
            Tautan Aplikasi
          </a>
        </li>
        <li class="group relative">
          <a href="javacript:void(0)"
            class="{{ ($activePage ?? '') === 'ppid' ? 'text-orange-600 border-b-2' : 'hover:text-slate-700 border-transparent border-b-2' }} h-full block hover:border-b-2 py-2 flex items-center gap-1">
            <span>PPID</span>
            <x-icons.chevron-down class="h-5 w-5 stroke-2 group-hover:rotate-180 duration-300" />
          </a>
          <div
            class="hidden group-hover:block bg-white p-1 min-w-40 w-max h-auto rounded absolute top-full ring-1 ring-slate-300 grid">
            <div class="hover:bg-slate-100 p-2 rounded">
              <a href="/arsip-dokumen" class="">
                Permohonan Informasi Publik
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
  </nav>
  <main class="bg-white">
    @yield('content')
  </main>
  <footer class="w-full bg-slate-900 py-10">
    <div class="max-w-screen-lg mx-auto text-slate-300">
      {{-- <p>Bumi</p>
      <p>Berazam</p> --}}
      <div class="">
        {{-- Line 1 --}}
        <div class="flex py-8 border-b border-slate-500">
          <div class="flex-1 space-y-2">
            <img src="{{ asset('assets/images/logo_kab.png') }}" class="w-32 h-auto" alt="">
          </div>


          <div class="w-2/4">
            <p class="text-9xl tracking-wide font-bold text-right text-slate-50/40">BUMI</p>
          </div>
        </div>

        {{-- Line 2 --}}
        <div class="flex py-8 items-end">
          <div class="flex-1">
            <p class="text-slate-200 text-base font-normal">KABUPATEN KARIMUN</p>
            <p class="text-sm font-light">DISKOMINFO</p>
          </div>
          <p class="w-3/4 leading-[0.8] text-9xl tracking-wide font-bold text-right text-slate-50/40">
            <span class="align-[0px]">BERAZAM</span>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div class="w-full bg-orange-600 py-1">
    <p class="text-sm text-center font-light text-slate-100">Copyright &copy; 2025 </p>
  </div>
</body>
