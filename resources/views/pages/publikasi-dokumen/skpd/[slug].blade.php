@php
  use App\Models\Institute;
  use App\Models\Document;

  $institutes = Institute::orderBy('name')->get();
  $institute = Institute::where('slug', $slug)->firstOrFail();
  $documents = Document::where('institute_id', $institute->id)
      ->with('institute')
      ->orderByDesc('published_at')
      ->paginate(10);
@endphp

@extends('layouts.app', ['activePage' => 'informasi-publik'])

@section('content')
  <x-docs.layout :institutes="$institutes" :documents="$documents" title="Publikasi Dokumen" :headerTitle="$institute->name" />
@endsection

@push('scripts')
  @vite(['resources/js/pdf.js'])
@endpush
