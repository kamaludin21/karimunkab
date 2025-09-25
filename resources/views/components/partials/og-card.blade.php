@props([
    'url' => 'https://www.karimunkab.go.id/',
    'title' => 'Pemerintah Kabupaten Karimun',
    'description' =>
        'Situs resmi Pemerintah Kabupaten Karimun. Akses informasi, berita, layanan publik, serta potensi daerah Karimun.',
    'image' => asset('assets/images/main_og_card.webp'),
])

{{-- Open Graph --}}
<meta property="og:url" content="{{ $url }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $title }}">
{{-- <meta property="og:description" content="{{ $description }}"> --}}
<meta property="og:image" content="{{ $image }}">



{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="{{ request()->getHost() }}">
<meta property="twitter:url" content="{{ $url }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:image" content="{{ $image }}">
