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
  <link rel="canonical" href="https://karimunkab.go.id/">

  {{-- Meta --}}
  <meta name="title" content="Pemerintah Kabupaten Karimun - Informasi Resmi & Layanan Publik">
  <meta name="description"
    content="Website resmi Pemerintah Kabupaten Karimun. Temukan informasi terbaru seputar pemerintahan, pelayanan publik, berita daerah, pengumuman, serta potensi wisata dan investasi di Kabupaten Karimun.">
  <meta name="keywords"
    content="Kabupaten Karimun, Pemerintah Karimun, Pemkab Karimun, Website Resmi Karimun, Berita Karimun, Wisata Karimun, Investasi Karimun, Kepulauan Riau, Layanan Publik Karimun">

  @yield('ogcard', view('components.partials.og-card'))
  <!-- Google tag (gtag.js) -->
  {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-S0M07HYF89"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-S0M07HYF89');
  </script> --}}

</head>

<body class="bg-white font-sans antialiased">
  @stack('popup')
  <x-navigation.nav :activePage="$activePage" />
  <main class="bg-white">
    @yield('content')
  </main>
  <footer class="w-full bg-slate-900 pt-10 pb-20">
    <div class="mx-auto max-w-screen-lg overflow-hidden px-2 text-slate-300">
      <div class="">
        <div class="relative flex border-b border-slate-700 py-8">
          <div class="z-10 flex-1 space-y-2">
            <img src="{{ asset('assets/images/logo_kab.png') }}" class="h-auto w-32" alt="" />
          </div>
          <div class="absolute right-0 bottom-0 z-0">
            <p
              class="bg-slate-900 bg-gradient-to-t via-slate-800 to-slate-800 bg-clip-text text-right text-9xl font-bold tracking-wide text-transparent opacity-50">
              BUMI</p>
          </div>
        </div>
        <div class="relative flex items-end py-8">
          <div class="z-10 flex-1">
            <p class="text-base font-normal text-slate-200">KABUPATEN KARIMUN</p>
            <p class="text-sm font-light">DISKOMINFO</p>
          </div>
          <p
            class="absolute top-4 right-0 bottom-0 bg-slate-900 bg-gradient-to-b via-slate-800 to-slate-800 bg-clip-text text-right text-9xl leading-[0.8] font-bold tracking-wide text-transparent opacity-50">
            <span class="align-[0px]">BERAZAM</span>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div class="w-full bg-slate-800 py-1">
    <p class="font-light text-center text-sm text-slate-100">DISKOMINFO &copy; 2025 Hak cipta dilindungi</p>
  </div>
</body>
