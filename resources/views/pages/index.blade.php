@php
// TODO: query link 5 here:

@endphp

@extends('layouts.app', ['activePage' => 'beranda'])

@section('content')
  <x-sections.hero />
  <x-sections.link />
  <x-sections.berita />
  <x-sections.nomor-penting />
  <x-sections.pengumuman />
  <x-sections.kabar-opd />
  <x-sections.publikasi-dokumen />
  <x-sections.kontak />
@endsection
