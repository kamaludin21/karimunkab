@php
  use App\Models\IpkdYear;
  use App\Models\IpkdDoc;

  // Ambil semua tahun aktif
  $years = IpkdYear::where('is_active', true)
      ->orderBy('year', 'desc')
      ->get();

  // Tentukan tahun aktif dari slug (atau fallback ke tahun aktif terbesar)
  $activeYear = $slug && $years->contains('year', $slug)
      ? $slug
      : $years->max('year');

  // Ambil dokumen untuk tahun aktif
  $ipkd = IpkdDoc::whereHas('year', fn($q) =>
          $q->where('year', $activeYear)
            ->where('is_active', true)
        )
        ->with('year')
        ->orderBy('order_in_year', 'asc')
        ->get();
@endphp

@extends('layouts.app', ['activePage' => 'ipkd'])

@section('content')
  <x-ipkd.layout
      :years="$years"
      :documents="$ipkd"
      title="IPKD"
      :headerTitle="'Tahun ' . $activeYear" />
@endsection

@push('scripts')
  @vite(['resources/js/objectPDF.js'])
@endpush
