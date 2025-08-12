@php
  $popup = App\Models\Popup::orderBy('order', 'asc')
    ->where('is_active', true)
    ->limit(3)->get();
  $links = App\Models\Link::orderBy('order', 'asc')->limit(5)->get();
  $news = App\Models\News::whereNotNull('published_at')->orderBy('published_at', 'desc')->limit(4)->get();
  $phones = App\Models\ImportantNumber::orderBy('order', 'asc')->limit(6)->get();
  $announcements = App\Models\Announcement::orderBy('published_at', 'desc')->limit(3)->get();
  $documents = App\Models\Document::orderBy('published_at', 'desc')->limit(5)->get();
@endphp

@extends('layouts.app', ['activePage' => 'beranda'])

@section('content')
  <x-sections.hero />
  <x-sections.link :links="$links" />
  <x-sections.berita :news="$news" />
  <x-sections.nomor-penting :phones="$phones" />
  <x-sections.pengumuman :announcements="$announcements" />
  <x-sections.kabar-opd number="6" />
  <x-sections.publikasi-dokumen :documents="$documents" />
  <x-sections.kontak />
@endsection

<x-commons.popup :popup="$popup" />


