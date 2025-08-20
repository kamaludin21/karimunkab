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
  <title>Pemerintah Kabupaten Karimun</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

  <link rel="canonical" href="https://karimunkab.go.id/">

  {{-- Seo TAG --}}
  <meta name="title" content="Pemerintah Kabupaten Karimun - Informasi Resmi & Layanan Publik">
  <meta name="description"
    content="Website resmi Pemerintah Kabupaten Karimun. Temukan informasi terbaru seputar pemerintahan, pelayanan publik, berita daerah, pengumuman, serta potensi wisata dan investasi di Kabupaten Karimun.">
  <meta name="keywords"
    content="Kabupaten Karimun, Pemerintah Karimun, Pemkab Karimun, Website Resmi Karimun, Berita Karimun, Wisata Karimun, Investasi Karimun, Kepulauan Riau, Layanan Publik Karimun">


  {{-- OG:Card --}}
  <meta property="og:title" content="Pemerintah Kabupaten Karimun - Website Resmi">
  <meta property="og:description"
    content="Situs resmi Pemerintah Kabupaten Karimun. Akses informasi, berita, layanan publik, serta potensi daerah Karimun.">
  <meta property="og:image" content="{{ asset('assets/images/main_og_card.jpg') }}">
  <meta property="og:url" content="https://www.karimunkab.go.id/">
  <meta property="og:type" content="website">
</head>

<body class="grid bg-slate-100">
  @stack('popup')
  <x-navigation.nav :activePage="$activePage" />
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
              class="text-9xl tracking-wide font-bold text-right bg-gradient-to-t bg-slate-900 via-slate-800 to-slate-800 bg-clip-text text-transparent opacity-50">
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
            class="absolute top-4 right-0 bottom-0 leading-[0.8] text-9xl tracking-wide font-bold text-right bg-gradient-to-b bg-slate-900 via-slate-800 to-slate-800 bg-clip-text text-transparent opacity-50">
            <span class="align-[0px]">BERAZAM</span>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div class="w-full bg-slate-800 py-1">
    <p class="text-sm text-center font-ligth text-slate-100">DISKOMINFOTIK &copy; 2025 Seluruh hak cipta dilindungi</p>
  </div>
</body>
