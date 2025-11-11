@php
  use App\Models\Institute;
  use App\Models\Document;

  $institutes = Institute::orderBy('name')->get();
  $documents = Document::with('institute')->orderBy('published_at', 'desc')->paginate(10);
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <x-docs.layout :institutes="$institutes" :documents="$documents" title="Publikasi Dokumen" headerTitle="Semua Dokumen"
    :show-institute="true" />
@endsection

@push('scripts')
  @vite(['resources/js/pdf.js'])
@endpush
