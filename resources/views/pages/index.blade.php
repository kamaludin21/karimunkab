@extends('layouts.app', ['activePage' => 'beranda'])

@section('content')
  <x-sections.hero />
  <x-sections.link />
  <x-sections.berita />
  <x-sections.pengumuman />
  <x-sections.kabar-opd />
  <x-sections.publikasi-dokumen />
  <x-sections.kontak />
@endsection
