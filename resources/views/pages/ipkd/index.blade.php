@php
  use App\Models\IpkdYear;
  use App\Models\IpkdDoc;

  // Ambil semua tahun aktif (urutan terbaru -> terlama)
  $years = IpkdYear::where('is_active', true)
      ->orderBy('year', 'desc')
      ->get();

  // Tentukan tahun aktif dari URL, atau fallback ke tahun aktif terbesar
  $currentYear = request()->segment(2);
  $activeYear = $currentYear ?? $years->max('year');

  // Ambil dokumen untuk tahun aktif terbesar
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
  <x-ipkd.layout :years="$years" :documents="$ipkd" title="IPKD" :headerTitle="'Tahun ' . $activeYear"  />
@endsection

@push('scripts')
  @vite(['resources/js/pdf.js'])
@endpush
