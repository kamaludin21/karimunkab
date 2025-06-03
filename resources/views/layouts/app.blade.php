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

<body class="bg-slate-200">
  <nav class="bg-white py-2 flex justify-between padding-x-wrapper">
    <div class="flex gap-4">
      <img src="{{ asset('assets/images/logo_kab.png') }}" class="w-16 h-auto" alt="logo_kab">
      <img src="{{ asset('assets/images/logo_hut.png') }}" class="w-16 h-auto" alt="logo_hut">
    </div>
    <div>
      <p>bg-search {$search-box}</p>
    </div>
  </nav>
  <main>
    @yield('content')
  </main>
</body>

</html>
