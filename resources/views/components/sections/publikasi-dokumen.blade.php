@props(['documents'])

{{-- Publikasi Dokumen --}}
<section class="w-full bg-white py-20">
  <div class="max-w-screen-lg px-2 lg:px-0 bg-white mx-auto grid gap-10">
    <x-commons.section-header title="Publikasi Dokumen" link="/publikasi-dokumen" buttonText="Lihat Semua" />

    <div class="grid w-full grid-cols-[1fr_auto] md:grid-cols-[auto_auto_1fr_auto]">
      <!-- Header Row -->
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block pl-1">TAHUN</div>
      <div class="text-slate-700 hidden bg-slate-100 pr-8 py-3 text-sm font-bold md:block">HARI BULAN</div>
      <div class="text-slate-700 bg-slate-100 pr-8 py-3 text-sm font-bold pl-1 md:pl-0">
        DOKUMEN
      </div>
      <div class="text-slate-700 py-3 text-sm font-bold text-center md:text-left w-full bg-slate-100 px-1">
        <p class="block md:hidden">DETAIL</p>
        <p class="hidden md:block">AUTHOR</p>
      </div>
      @php
        $prevYear = null;
        $prevDate = null;
      @endphp

      @foreach ($documents as $doc)
        @php
          $year = $doc->published_at?->year;
          $date = $doc->published_at?->translatedFormat('j F');
        @endphp

        <div class="contents group">
          {{-- TAHUN --}}
          <div
            class="hidden pr-8 md:flex items-start py-3 text-slate-700 pl-1
      @if ($prevYear !== $year) border-t border-slate-300 @endif">
            @if ($prevYear !== $year)
              {{ $year }}
              @php $prevYear = $year; @endphp
            @endif
          </div>

          {{-- HARI BULAN --}}
          <div
            class="hidden pr-8 md:flex items-start py-3 text-slate-700
      @if ($prevDate !== $date) border-t border-slate-300 @endif">
            @if ($prevDate !== $date)
              {{ $date }}
              @php $prevDate = $date; @endphp
            @endif
          </div>

          {{-- JUDUL --}}
          <div class="border-t border-slate-300 pr-8 text-slate-700 flex items-start py-3 grid">
            <span class="block md:hidden font-medium flex items-center gap-2 text-sm text-slate-500">
              <p>{{ \Carbon\Carbon::parse($doc->published_at)->isoFormat('D MMMM Y') }}</p>
              <x-icons.dot class="w-1 h-1" />
              <p>{{ $doc->institute->alias ?? '-' }}</p>
            </span>
            <span class="text-base font-medium line-clamp-2">
              {{ $doc->title }}
            </span>
          </div>

          {{-- AUTHOR --}}
          <div
            class="border-t border-slate-300 text-slate-700 flex gap-2 items-center md:items-start justify-between w-full px-1 py-3">
            <p class="hidden md:block line-clamp-1">{{ $doc->institute->alias ?? '-' }}</p>
            {{-- <a href="/publikasi-dokumen/{{ $doc->slug }}"
              class="text-center hover:bg-slate-100 rounded-sm px-1.5 cursor-pointer hover:scale-105 hover:text-orange-600 duration-200 mx-auto md:mx-0">
              <svg fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor"
                class="w-8 h-fit mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
              </svg>
            </a> --}}
            <button data-file="{{ asset('storage/' . $doc->file) }}" data-title="{{ $doc->title }}"
              data-org="{{ $doc->institute->name ?? 'Tidak diketahui' }}"
              data-date="{{ $doc->published_at?->isoFormat('D MMMM Y') ?? '-' }}"
              data-size="{{ $doc->size ?? 'Tidak ditemukan' }}" onclick="openPDF(this)"
              class="active:scale-95 p-2 bg-slate-100 rounded-full focus:outline-none group">
              <x-icons.text-scan class="h-5 w-auto stroke-2 group-hover:text-orange-400 text-slate-600" />
            </button>
          </div>
        </div>
      @endforeach
    </div>
    <div
      class="flex md:hidden items-center before:h-px before:flex-1 before:bg-gray-300  before:content-[''] after:h-px after:flex-1 after:bg-gray-300  after:content-['']">
      <a href="/publikasi-dokumen"
        class="text-slate-600 hover:text-white hover:bg-orange-600 cursor-pointer border border-slate-300 w-fit mx-auto px-3 py-1 rounded-full">
        Dokumen Lainnya
      </a>
    </div>
  </div>
</section>
<x-commons.modal id="preview-pdf" title="Show PDF" :show="false">
  <div x-data="{ tab: 'preview' }" class="min-w-sm md:min-w-md w-full h-[85dvh] rounded-lg overflow-hidden flex flex-col">
    <div class="flex-1 relative w-full h-full overflow-hidden bg-white">
      <div x-show="tab === 'preview'" x-transition.opacity x-cloak class="absolute inset-0 w-full h-full"
        id="viewer"></div>
      <div x-show="tab === 'info'" x-transition.opacity x-cloak
        class="absolute inset-0 w-full h-full p-4 overflow-y-auto text-slate-700 bg-white" id="info">
        <div class="space-y-3 flex-1">
          <p class="text-lg text-slate-600">Informasi Dokumen</p>
          <hr class="border-t border-slate-200">

          <div>
            <p class="text-slate-400 text-sm font-medium">Judul</p>
            <p id="info-title" class="text-base font-medium text-slate-700 leading-6">–</p>
          </div>

          <div>
            <p class="text-slate-400 text-sm font-medium">Pemilik</p>
            <p id="info-org" class="text-base font-medium text-slate-700 leading-6">–</p>
          </div>

          <div>
            <p class="text-slate-400 text-sm font-medium">Tanggal Publikasi</p>
            <p id="info-date" class="text-base font-medium text-slate-700 leading-6">–</p>
          </div>

          <div>
            <p class="text-slate-400 text-sm font-medium">Ukuran File</p>
            <p id="info-size" class="text-base font-medium text-slate-700 leading-6">–</p>
          </div>

        </div>
      </div>
    </div>

    {{-- === TAB BUTTONS === --}}
    <div class="min-w-sm md:min-w-md w-full h-fit rounded-b-lg flex p-1 gap-1 border-t border-slate-200 bg-white">
      <button @click="tab = 'info'" :class="tab === 'info' ? 'bg-orange-600 text-white' : 'border text-slate-600'"
        class="flex-1 p-2 rounded-md border-slate-300 duration-150">
        Informasi Dokumen
      </button>
      <button @click="tab = 'preview'"
        :class="tab === 'preview' ? 'bg-orange-600 text-white' : 'border text-slate-600'"
        class="flex-1 p-2 rounded-md border-slate-300 duration-150">
        Preview
      </button>
    </div>
  </div>
</x-commons.modal>

@push('scripts')
  @vite(['resources/js/pdf.js'])
@endpush
